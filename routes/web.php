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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function ()
{
    return view('index');
});

Route::get('/contact', function ()
{
    return view('contact');
});

Route::get('/intro', function ()
{
    return view('intro');
});

Route::get('/portefolio', function ()
{
    return view('portefolio');
});

Route::get('/about', function ()
{
    return view('about');
});


Route::get('/magazine/lister', 'MagazineController@DisplayMagazine');