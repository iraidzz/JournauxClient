<?php
/**
 * Created by PhpStorm.
 * User: loick
 * Date: 28/06/2017
 * Time: 13:41
 */

namespace App\Http\Controllers;


class UserController extends Controller
{

    public function Authentifier()
    {

        $ch = curl_init();
        // configuration des options
//        curl_setopt($ch, CURLOPT_URL, "http://journaux.dev/api/client/enregistrer");
        curl_setopt($ch, CURLOPT_URL, "http://10.0.10.110/api/client/authentifier");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        // data à envoyer
        $data = [];
        $data['user']['email'] = request()->only('email')['email'];
        $data['user']['password'] = request()->only('password')['password'];

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        // exécution de la session : $content est le retour de l'api
        $content = json_decode(curl_exec($ch), true);
        // fermeture de la session
        dd($content);
        curl_close($ch);


        return view('intro');

    }


}