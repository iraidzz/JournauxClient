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

    public function mesabonnements($id)
    {
        // -------- Premiere partie, on rappatrie les Informations des abonnements du client -------
        //client_id
        //publication_id
        //date_debut
        //date_fin
        //date_pause
        //////////////////////////////////////////////////////////

        $url= "http://journaux.dev/api/client/mesabonnements/$id";
        //$url= "http://10.0.10.110/api/magazine/lister";

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

        $mesabonnements = json_decode(curl_exec($ch), true)['result'];


        foreach($mesabonnements as $UserData)
        {
            $idPublication[] = $UserData['publication_id'];
        }
        curl_close($ch);




        // -------- Deuxieme partie , un rappatrie les informations des publications pour lesquelles le client s'est abonné -------
        //client_id
        //publication_id
        //date_debut
        //date_fin
        //date_pause
        //////////////////////////////////////////////////////////


        $url2= "http://journaux.dev/api/magazine/lister";
        //$url= "http://10.0.10.110/api/magazine/lister";

        $options2 = array(
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

        $ch2 = curl_init($url2);
        curl_setopt_array($ch2, $options2);

        $publications2 = json_decode(curl_exec($ch2), true)['result'];

        curl_close($ch2);

        return view('mesabonnements')->with('mesabonnements', $mesabonnements)->with('publications', $publications2);


    }


    public function sabonner()
    {

        $client_id=request()->only('client_id')['client_id'];
        $publication_id=request()->only('publication_id')['publication_id'];
        // quand on passe par les données date envoye erreur sur le format date alors qu'en dur sa passe
//        $date_debut=request()->only('date_debut')['date_debut'];
//        $date_fin=request()->only('date_fin')['date_fin'];
//        $date_pause=request()->only('date_pause')['date_pause'];

        $date_debut="2010-12-02";
        $date_fin="2010-12-02";
        $date_pause="2010-12-02";

        $ch = curl_init();
        $url = "http://journaux.dev/api/client/sabonner";
        // configuration des options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"client_id=$client_id&publication_id=$publication_id&date_debut=$date_debut&date_fin=$date_fin&date_pause=$date_pause");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        $content =curl_exec($ch);
        curl_close($ch);

        return redirect('/intro');

    }

    public function MonCompte($id)
    {
        $url= "http://journaux.dev/api/client/moncompte/$id";
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

        $compteinfo = json_decode(curl_exec($ch), true)['result'];

        curl_close($ch);

        return view('compte')->with('compteinfo', $compteinfo);
    }

    public function DisplayEditCompte($id)
    {
        $url= "http://journaux.dev/api/client/affichereditcompte/$id";
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

        $compteinfo = json_decode(curl_exec($ch), true)['result'];

        curl_close($ch);

        return view('editclient')->with('compteinfo', $compteinfo);
    }

    public function EditCompte()
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
        $url = "http://journaux.dev/api/client/edit";
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