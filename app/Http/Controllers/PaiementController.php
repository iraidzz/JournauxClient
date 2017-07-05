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

}