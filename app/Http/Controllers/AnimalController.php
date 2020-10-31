<?php

namespace App\Http\Controllers;

use DB;
use Storage;
use App\Animal;
use App\Couple;
use Illuminate\Http\Request;
use App\Http\Requests\Animal\UpdateRequest;

class AnimalController extends Controller
{
    /**
     * Search animal by keyword.
     *
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $q = $request->get('q');
        $animals = [];

        if ($q) {
            $animals = Animal::with('father', 'mother')->where(function ($query) use ($q) {
                $query->where('name', 'like', '%'.$q.'%');
                $query->orWhere('nickname', 'like', '%'.$q.'%');
            })
                ->orderBy('name', 'asc')
                ->paginate(24);
        }

        return view('animals.search', compact('animals'));
    }

    /**
     * Display the specified Animal.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\View\View
     */
    public function show(Animal $animal)
    {
        $animalsMariageList = $this->getAnimalMariageList($animal);
        $allMariageList = $this->getAllMariageList();
        $malePersonList = $this->getPersonList(1);
        $femalePersonList = $this->getPersonList(2);

        return view('animals.show', [
            'animal'             => $animal,
            'animalsMariageList' => $animalsMariageList,
            'malePersonList'   => $malePersonList,
            'femalePersonList' => $femalePersonList,
            'allMariageList'   => $allMariageList,
        ]);
    }

    /**
     * Display the animal's family chart.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\View\View
     */
    public function chart(Animal $animal)
    {
        $father = $animal->father_id ? $animal->father : null;
        $mother = $animal->mother_id ? $animal->mother : null;

        $fatherGrandpa = $father && $father->father_id ? $father->father : null;
        $fatherGrandma = $father && $father->mother_id ? $father->mother : null;

        $motherGrandpa = $mother && $mother->father_id ? $mother->father : null;
        $motherGrandma = $mother && $mother->mother_id ? $mother->mother : null;

        $childs = $animal->childs;
        $colspan = $childs->count();
        $colspan = $colspan < 4 ? 4 : $colspan;

        $siblings = $animal->siblings();

        return view('animals.chart', compact(
            'animal', 'childs', 'father', 'mother', 'fatherGrandpa',
            'fatherGrandma', 'motherGrandpa', 'motherGrandma',
            'siblings', 'colspan'
        ));
    }

    /**
     * Show animal family tree.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\View\View
     */
    public function tree(Animal $animal)
    {
        return view('animals.tree', compact('animal'));
    }

    /**
     * Show the form for editing the specified Animal.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\View\View
     */
    public function edit(Animal $animal)
    {
        $this->authorize('edit', $animal);

        $replacementAnimals = [];
        if (request('action') == 'delete') {
            $replacementAnimals = $this->getPersonList($animal->gender_id);
        }

        return view('animals.edit', compact('animal', 'replacementAnimals'));
    }

    /**
     * Update the specified Animal in storage.
     *
     * @param  \App\Http\Requests\Animals\UpdateRequest  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Animal $animal)
    {
        $animal->update($request->validated());

        return redirect()->route('animals.show', $animal->id);
    }

    /**
     * Remove the specified Animal from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Animal $animal)
    {
        $this->authorize('delete', $animal);

        if ($request->has('replace_delete_button')) {
            $attributes = $request->validate([
                'replacement_animal_id' => 'required|exists:animals,id',
            ], [
                'replacement_animal_id.required' => __('validation.animal.replacement_animal_id.required'),
            ]);

            DB::beginTransaction();
            $this->replaceAnimalOnAnimalsTable($animal->id, $attributes['replacement_animal_id']);
            $this->replaceAnimalOnCouplesTable($animal->id, $attributes['replacement_animal_id']);
            $animal->delete();
            DB::commit();

            return redirect()->route('animals.show', $attributes['replacement_animal_id']);
        }

        $request->validate([
            'animal_id' => 'required',
        ]);

        if ($request->get('animal_id') == $animal->id && $animal->delete()) {
            return redirect()->route('animals.search');
        }

        return back();
    }

    /**
     * Upload animals photo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function photoUpload(Request $request, Animal $animal)
    {
        $request->validate([
            'photo' => 'required|image|max:200',
        ]);

        if (Storage::exists($animal->photo_path)) {
            Storage::delete($animal->photo_path);
        }

        $animal->photo_path = $request->photo->store('images');
        $animal->save();

        return back();
    }

    /**
     * Replace Animal Ids on animals table.
     *
     * @param  string  $oldAnimalId
     * @param  string  $replacementAnimalId
     * @return void
     */
    private function replaceAnimalOnAnimalsTable($oldAnimalId, $replacementAnimalId)
    {
        foreach (['father_id', 'mother_id', 'manager_id'] as $field) {
            DB::table('animals')->where($field, $oldAnimalId)->update([
                $field => $replacementAnimalId,
            ]);
        }
    }

    /**
     * Replace Animal Ids on couples table.
     *
     * @param string $oldAnimalId
     * @param string $replacementAnimalId
     *
     * @return void
     */
    private function replaceAnimalOnCouplesTable($oldAnimalId, $replacementAnimalId)
    {
        foreach (['husband_id', 'wife_id', 'manager_id'] as $field) {
            DB::table('couples')->where($field, $oldAnimalId)->update([
                $field => $replacementAnimalId,
            ]);
        }
    }

    /**
     * Get Animal list based on gender.
     *
     * @param int $genderId
     *
     * @return \Illuminate\Support\Collection
     */
    private function getPersonList(int $genderId)
    {
        return Animal::where('gender_id', $genderId)->pluck('nickname', 'id');
    }

    /**
     * Get marriage list of a animal.
     *
     * @param \App\Animal $animal
     *
     * @return array
     */
    private function getAnimalMariageList(Animal $animal)
    {
        $animalsMariageList = [];

        foreach ($animal->couples as $spouse) {
            $animalsMariageList[$spouse->pivot->id] = $animal->name.' & '.$spouse->name;
        }

        return $animalsMariageList;
    }

    /**
     * Get all marriage list.
     *
     * @return array
     */
    private function getAllMariageList()
    {
        $allMariageList = [];

        foreach (Couple::with('husband', 'wife')->get() as $couple) {
            $allMariageList[$couple->id] = $couple->husband->name.' & '.$couple->wife->name;
        }

        return $allMariageList;
    }
}
