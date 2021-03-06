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
Route::get('/magazine/lister/{id}', 'MagazineController@DisplayMagazine');
// Route recherche magazines
Route::post('/magazine/filtrer', 'MagazineController@FiltreMagazine');

// Route "Mes abonnements en cours"
Route::get('/client/mesabonnements/{id}', 'ClientController@mesabonnements');
// Route "Mes anciens en cours"
Route::get('/client/mesanciensabonnements/{id}', 'ClientController@mesanciensabonnements');
// Route "S'abonner"
Route::post('/client/sabonner', 'ClientController@sabonner');
// Route "Renouveler Abonnement" (On +1 année à la date de fin abonnement (attention , différent de "relancer abonnement arrêté"
Route::post('/client/renouvelerabonnement', 'ClientController@renouvelerabonnement');
// Route "Suspendre Abonnement"
Route::post('/client/suspendreabonnement', 'ClientController@suspendreabonnement');
// Route "Relancer Abonnement arrêté" (On remet à 1 l'etat , et on +1 année à la date Jour -j (aujourd'hui)
Route::post('/client/relancerabonnementarrete', 'ClientController@relancerabonnementarrete');

// Gestion du compte client
Route::get('/client/moncompte/{id}', 'ClientController@MonCompte');
Route::get('/client/affichereditcompte/{id}', 'ClientController@DisplayEditCompte');
Route::post('/client/edit',"ClientController@EditCompte" );

//Page enregistrement client (inscription)
Route::get('/client/inscription', 'ClientController@inscription');
//Validation enregistrement client (inscription)
Route::post('/client/ajouter', 'ClientController@ajouter');

/* Route pour la gestion des paiements et du panier */
Route::get('/client/panier/{id}', 'PaiementController@DisplayPanier');
Route::get('/client/paiement/{id}/{prix}', 'PaiementController@DisplayPaiement');
Route::post('/client/paiementfinal', 'PaiementController@Paiement');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
