<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    $jobs = App\Models\Job::all();
    $skills = App\Models\Skill::all();

    return view('lamaran', [
        'jobs' => $jobs,
        'skills' => $skills
    ]);
});

Route::get('/jobs', 'JobController@index');
