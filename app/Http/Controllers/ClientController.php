<?php

namespace App\Http\Controllers;


class ClientController extends Controller
{
    public function inscription()
    {
        return view('register');
    }

    public function ajouter()
    {

        $ch = curl_init();
        // configuration des options
        curl_setopt($ch, CURLOPT_URL, "http://journaux.dev/api/client/enregistrer");
//        curl_setopt($ch, CURLOPT_URL, "http://10.0.10.110/api/client/enregistrer");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        // data à envoyer
        $data = [];
        $data['user']['name'] = request()->only('name')['name'];
        $data['user']['email'] = request()->only('email')['email'];
        $data['user']['password'] = request()->only('password')['password'];
        $data['user']['prenom'] = request()->only('prenom')['prenom'];
        $data['user']['civilite'] = request()->only('civilite')['civilite'];
        $data['user']['numero_telephone'] = request()->only('numero_telephone')['numero_telephone'];
        $data['user']['date_naissance'] = request()->only('date_naissance')['date_naissance'];
        $data['user']['lieu_naissance'] = request()->only('lieu_naissance')['lieu_naissance'];
        $data['user']['adresse_domicile'] = request()->only('adresse_domicile')['adresse_domicile'];
        $data['user']['postal_domicile'] = request()->only('postal_domicile')['postal_domicile'];
        $data['user']['ville_domicile'] = request()->only('ville_domicile')['ville_domicile'];

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        // exécution de la session : $content est le retour de l'api
        $content = json_decode(curl_exec($ch), true);
        // fermeture de la session
        curl_close($ch);

    }

    public function mesabonnements()
    {

        $url = "http://journaux.dev/api/magazine/lister";
        //$url= "http://10.0.10.110/api/magazine/lister";

        $options = array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HEADER => false,  // don't return headers
            CURLOPT_FOLLOWLOCATION => true,   // follow redirects
            CURLOPT_MAXREDIRS => 10,     // stop after 10 redirects
            CURLOPT_ENCODING => "",     // handle compressed
            CURLOPT_USERAGENT => "", // name of client
            CURLOPT_AUTOREFERER => true,   // set referrer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
            CURLOPT_TIMEOUT => 120,    // time-out on response
        );

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);

        $publications = json_decode(curl_exec($ch), true)['result'];

        curl_close($ch);

        return view('mesabonnements')->with('publications', $publications);
    }




}