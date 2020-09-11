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
Route::get('/', 'IndexController@index')->middleware('auth');

Route::resource('cursos', CursoController::class)->middleware('auth');
Route::resource('escolas', EscolaController::class)->middleware('auth');
Route::resource('turmas', TurmaController::class);
Route::resource('series', 'SerieController')->middleware('auth');
Route::any('alunos/search', 'AlunoController@search')->name('alunos.search');
Route::resource('alunos', AlunoController::class)->middleware('auth');



Auth::routes();

