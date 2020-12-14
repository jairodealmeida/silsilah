<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'UsersController@search');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('password/change', 'Auth\ChangePasswordController@show')->name('password.change');
    Route::post('password/change', 'Auth\ChangePasswordController@update')->name('password.change');
});

Route::get('home', 'HomeController@index')->name('home');
Route::get('profile', 'HomeController@index')->name('profile');
Route::post('family-actions/{user}/set-father', 'FamilyActionsController@setFather')->name('family-actions.set-father');
Route::post('family-actions/{user}/set-mother', 'FamilyActionsController@setMother')->name('family-actions.set-mother');
Route::post('family-actions/{user}/add-child', 'FamilyActionsController@addChild')->name('family-actions.add-child');
Route::post('family-actions/{user}/add-wife', 'FamilyActionsController@addWife')->name('family-actions.add-wife');
Route::post('family-actions/{user}/add-husband', 'FamilyActionsController@addHusband')->name('family-actions.add-husband');
Route::post('family-actions/{user}/set-parent', 'FamilyActionsController@setParent')->name('family-actions.set-parent');

Route::get('profile-search', 'UsersController@search')->name('users.search');
Route::get('users/{user}', 'UsersController@show')->name('users.show');
Route::get('users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::patch('users/{user}', 'UsersController@update')->name('users.update');
Route::get('users/{user}/chart', 'UsersController@chart')->name('users.chart');
Route::get('users/{user}/tree', 'UsersController@tree')->name('users.tree');
Route::patch('users/{user}/photo-upload', 'UsersController@photoUpload')->name('users.photo-upload');
Route::delete('users/{user}', 'UsersController@destroy')->name('users.destroy');

Route::get('users/{user}/marriages', 'UserMarriagesController@index')->name('users.marriages');

Route::get('users/{user}/pedigree', 'UserPedigreeController@index')->name('users.pedigree');

Route::get('birthdays', 'BirthdayController@index')->name('birthdays.index');

/**
 * Couple/Marriages Routes
 */
Route::get('couples/{couple}', ['as' => 'couples.show', 'uses' => 'CouplesController@show']);
Route::get('couples/{couple}/edit', ['as' => 'couples.edit', 'uses' => 'CouplesController@edit']);
Route::patch('couples/{couple}', ['as' => 'couples.update', 'uses' => 'CouplesController@update']);

/*Route::get('race', 'RaceController@index')->name('race.index');
Route::get('race/register', ['as' => 'race.register', 'races' => 'RaceController@register']);
Route::get('race/{race}', ['as' => 'races.show', 'races' => 'RaceController@show']);
Route::get('race/{race}/edit', ['as' => 'races.edit', 'races' => 'RaceController@edit']);
Route::patch('race/{race}', ['as' => 'races.update', 'races' => 'RaceController@update']);*/
//Route::apiResource('races', 'RaceController');


Route::get('proprietaries', 'ProprietaryController@index')->name('proprietaries.index');
Route::get('proprietaries/create', 'ProprietaryController@create')->name('proprietaries.create');
Route::post('proprietaries', 'ProprietaryController@store')->name('proprietaries.store');
Route::get('proprietaries/{proprietary}', 'ProprietaryController@show')->name('proprietaries.show');
Route::get('proprietaries/{proprietary}/edit', 'ProprietaryController@edit')->name('proprietaries.edit');
Route::patch('proprietaries/{proprietary}', 'ProprietaryController@update')->name('proprietaries.update');
Route::delete('proprietaries/{proprietary}', 'ProprietaryController@destroy')->name('proprietaries.destroy');



Route::get('races', 'RaceController@index')->name('races.index');
Route::get('races/create', 'RaceController@create')->name('races.create');
Route::post('races', 'RaceController@store')->name('races.store');
Route::get('races/{race}', 'RaceController@show')->name('races.show');
Route::get('races/{race}/edit', 'RaceController@edit')->name('races.edit');
Route::patch('races/{race}', 'RaceController@update')->name('races.update');
Route::delete('races/{race}', 'RaceController@destroy')->name('races.destroy');

Route::get('countries', 'CountryController@index')->name('countries.index');
Route::get('countries/create', 'CountryController@create')->name('countries.create');
Route::post('countries', 'CountryController@store')->name('countries.store');
Route::get('countries/{country}', 'CountryController@show')->name('countries.show');
Route::get('countries/{country}/edit', 'CountryController@edit')->name('countries.edit');
Route::patch('countries/{country}', 'CountryController@update')->name('countries.update');
Route::delete('countries/{country}', 'CountryController@destroy')->name('countries.destroy');

Route::get('species', 'SpecieController@index')->name('species.index');
Route::get('species/create', 'SpecieController@create')->name('species.create');
Route::post('species', 'SpecieController@store')->name('species.store');
Route::get('species/{specie}', 'SpecieController@show')->name('species.show');
Route::get('species/{specie}/edit', 'SpecieController@edit')->name('species.edit');
Route::patch('species/{specie}', 'SpecieController@update')->name('species.update');
Route::delete('species/{specie}', 'SpecieController@destroy')->name('species.destroy');


Route::get('genotypes', 'GenotypeController@index')->name('genotypes.index');
Route::get('genotypes/create', 'GenotypeController@create')->name('genotypes.create');
Route::post('genotypes', 'GenotypeController@store')->name('genotypes.store');
Route::get('genotypes/{genotype}', 'GenotypeController@show')->name('genotypes.show');
Route::get('genotypes/{genotype}/edit', 'GenotypeController@edit')->name('genotypes.edit');
Route::patch('genotypes/{genotype}', 'GenotypeController@update')->name('genotypes.update');
Route::delete('genotypes/{genotype}', 'GenotypeController@destroy')->name('genotypes.destroy');

//Route::get('creators', 'CreatorsController@index')->name('creators.index');
Route::get('creators', 'CreatorsController@index')->name('creators.index');
Route::get('creators/create', 'CreatorsController@create')->name('creators.create');
Route::post('creators', 'CreatorsController@store')->name('creators.store');
Route::get('creators/{creator}', 'CreatorsController@show')->name('creators.show');
Route::get('creators/{creator}/edit', 'CreatorsController@edit')->name('creators.edit');
Route::patch('creators/{creator}', 'CreatorsController@update')->name('creators.update');
Route::delete('creators/{creator}', 'CreatorsController@destroy')->name('creators.destroy');
Route::post('creators/{office}', 'CreatorsController@block')->name('creators.block');

Route::get('animals', 'AnimalsController@index')->name('animals.index');
Route::get('animals/create', 'AnimalsController@create')->name('animals.create');
Route::post('animals', 'AnimalsController@store')->name('animals.store');
Route::get('animals/{animal}', 'AnimalsController@show')->name('animals.show');
Route::get('animals/{animal}/edit', 'AnimalsController@edit')->name('animals.edit');
Route::patch('animals/{animal}', 'AnimalsController@update')->name('animals.update');
Route::delete('animals/{animal}', 'AnimalsController@destroy')->name('animals.destroy');


Route::get('offices', 'OfficesController@index')->name('offices.index');
Route::get('offices/create', 'OfficesController@create')->name('offices.create');
Route::post('offices', 'OfficesController@store')->name('offices.store');
Route::get('offices/{office}', 'OfficesController@show')->name('offices.show');
Route::get('offices/{office}/edit', 'OfficesController@edit')->name('offices.edit');
Route::patch('offices/{office}', 'OfficesController@update')->name('offices.update');
Route::delete('offices/{office}', 'OfficesController@destroy')->name('offices.destroy');
Route::post('offices/{office}', 'OfficesController@block')->name('offices.block');

/**
 * Admin only routes
 */
Route::group(['middleware' => 'admin'], function () {
    /**
     * Backup Restore Database Routes
     */
    Route::post('backups/upload', ['as' => 'backups.upload', 'uses' => 'BackupsController@upload']);
    Route::post('backups/{fileName}/restore', ['as' => 'backups.restore', 'uses' => 'BackupsController@restore']);
    Route::get('backups/{fileName}/dl', ['as' => 'backups.download', 'uses' => 'BackupsController@download']);
    Route::resource('backups', 'BackupsController');
});
