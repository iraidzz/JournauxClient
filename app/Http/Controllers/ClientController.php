<?php

namespace App\Http\Controllers;


class ClientController extends Controller
{
    public function inscription()
    {
        return view('register');
    }

    public function ajouter(Request $request)
    {


        $ch = curl_init();

        $data = [];
        $data['user']['name'] = $request->only('name')['name'];
        $data['user']['email'] = $request->only('email')['email'];
        $data['user']['password'] = $request->only('password')['password'];
        $data['user']['prenom'] = $request->only('prenom')['prenom'];
        $data['user']['civilite'] = $request->only('civilite')['civilite'];
        $data['user']['numero_telephone'] = $request->only('numero_telephone')['numero_telephone'];
        $data['user']['date_naissance'] = $request->only('date_naissance')['date_naissance'];
        $data['user']['lieu_naissance'] = $request->only('lieu_naissance')['lieu_naissance'];
        $data['user']['adresse_domicile'] = $request->only('adresse_domicile')['adresse_domicile'];
        $data['user']['postal_domicile'] = $request->only('postal_domicile')['postal_domicile'];
        $data['user']['ville_domicile'] = $request->only('ville_domicile')['ville_domicile'];

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        // exécution de la session : $content est le retour de l'api
        $content = json_decode(curl_exec($ch), true);
        dd($content);
        // fermeture de la session
        curl_close($ch);



    }




}