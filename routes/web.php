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

Route::get('/index', function () {
    return view('index');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/intro', function () {
    return view('intro');
});

Route::get('/portefolio', function () {
    return view('portefolio');
});

Route::get('/about', function () {
    return view('about');
});

//Authentification et déconnexion
Route::post('/client/authentifier', 'UserController@Authentifier');
Route::get('/client/logout', 'UserController@Logout');

// Route affichage liste comlète des magazines
Route::get('/magazine/lister', 'MagazineController@DisplayMagazine');

// Route "Mes abonnements en cours"
Route::get('/client/mesabonnements/{id}', 'ClientController@mesabonnements');
// Route "Mes anciens en cours"
Route::get('/client/mesanciensabonnements/{id}', 'ClientController@mesanciensabonnements');
// Route "S'abonner"
Route::post('/client/sabonner', 'ClientController@sabonner');
// Route "Renouveler Abonnement"
Route::post('/client/renouvelerabonnement', 'ClientController@renouvelerabonnement');
// Route "Suspendre Abonnement"
Route::post('/client/suspendreabonnement', 'ClientController@suspendreabonnement');

// Gestion du compte client
Route::get('/client/moncompte/{id}', 'ClientController@MonCompte');
Route::get('/client/affichereditcompte/{id}', 'ClientController@DisplayEditCompte');
Route::post('/client/edit',"ClientController@EditCompte" );

//Page enregistrement client (inscription)
Route::get('/client/inscription', 'ClientController@inscription');
//Validation enregistrement client (inscription)
Route::post('/client/ajouter', 'ClientController@ajouter');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
