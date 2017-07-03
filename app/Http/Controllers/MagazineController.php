<?php
/**
 * Created by PhpStorm.
 * User: loick
 * Date: 26/06/2017
 * Time: 15:16
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class MagazineController
{

    public function DisplayMagazine()
    {

        $url= "http://journaux.dev/api/magazine/lister";
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

        $publications = json_decode(curl_exec($ch), true)['result'];

        curl_close($ch);

        return view('magazine')->with('publications', $publications);
    }


    public function FiltreMagazine(Request $request)
    {

        $post = $request->all();
        $laValeurRecherchee = $post['titre'];

        $ch = curl_init();
        $url= "http://journaux.dev/api/magazine/filtrer";

        // configuration des options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"titre=$laValeurRecherchee");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        $content =curl_exec($ch);
        curl_close($ch);
//dd($idAbonnement);
        return redirect('/magazine/filtrer');

    }


}