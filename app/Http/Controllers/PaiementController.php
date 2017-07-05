<?php
/**
 * Created by PhpStorm.
 * User: loick
 * Date: 04/07/2017
 * Time: 14:36
 */

namespace App\Http\Controllers;


use Symfony\Component\VarDumper\VarDumper;

class PaiementController
{

    public function DisplayPanier($id)
    {
        $url= "http://journaux.dev/api/client/panier/$id";
        //$url= "http://10.0.10.110/api/client/moncompte";

        $options = array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HEADER         => false,  // don't return headers
            CURLOPT_FOLLOWLOCATION => true,   // follow redirects
            CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
            CURLOPT_ENCODING       => "",     // handle compressed
            CURLOPT_USERAGENT      => "", // name of client
            CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
            CURLOPT_TIMEOUT        => 120,    // time-out on response
        );

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);

        $panier = json_decode(curl_exec($ch), true)['result'];
        curl_close($ch);

        return view('panier')->with('panier', $panier);
    }

    public function DisplayPaiement($id, $prix)
    {

        return view('paiement')->with('id', $id)->with('prix', $prix);


    }


    public function Paiement()
    {

        $id=request()->only('id')['id'];
        $name=request()->only('name')['name'];
        $email=request()->only('email')['email'];
        $password=request()->only('password')['password'];
        $prenom=request()->only('prenom')['prenom'];
        $civilite=request()->only('civilite')['civilite'];
        $numero_telephone=request()->only('numero_telephone')['numero_telephone'];
        $date_naissance=request()->only('date_naissance')['date_naissance'];
        $lieu_naissance=request()->only('lieu_naissance')['lieu_naissance'];
        $adresse_domicile=request()->only('adresse_domicile')['adresse_domicile'];
        $postal_domicile=request()->only('postal_domicile')['postal_domicile'];
        $ville_domicile=request()->only('ville_domicile')['ville_domicile'];

        $ch = curl_init();
        $url = "http://journaux.dev/api/client/paiementfinal";
        // configuration des options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"id=$id&name=$name&email=$email&password=$password&prenom=$prenom&civilite=$civilite&numero_telephone=$numero_telephone&date_naissance=$date_naissance&lieu_naissance=$lieu_naissance&adresse_domicile=$adresse_domicile&postal_domicile=$postal_domicile&ville_domicile=$ville_domicile");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        $content =curl_exec($ch);

        curl_close($ch);

        return redirect('/client/moncompte/'.$id);


    }


}