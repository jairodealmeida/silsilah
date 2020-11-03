<?php

namespace App\Http\Controllers;

use App\User;

class UserPedigreeController extends Controller
{
    /**
     * Show user pedigree list.
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function index(User $user)
    {
        $marriages = $user->marriages()->with('husband', 'wife')
            ->withCount('childs')->get();

        return view('users.pedigree', compact('user', 'marriages'));
    }
}
