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

    public function DisplayMagazine($id)
    {
        $url2= "http://10.0.10.110/journaux/public/api/client/mesabonnements/$id";

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

        $mesabonnements2 = json_decode(curl_exec($ch2), true)['result'];


        foreach($mesabonnements2 as $UserData2)
        {
            $idPublication2[] = $UserData2['publication_id'];
        }
        curl_close($ch2);







        $url= "http://10.0.10.110/journaux/public/api/magazine/lister";

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

        return view('magazine')->with('publications', $publications)->with('mesabonnements', $mesabonnements2);
    }


    public function FiltreMagazine(Request $request)
    {
        $post = $request->all();
        $laValeurRecherchee = $post['titre'];
        $id = $post['id'];

//        dd($id);


        $url2= "http://10.0.10.110/journaux/public/api/client/mesabonnements/$id";

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

        $mesabonnements2 = json_decode(curl_exec($ch2), true)['result'];


        foreach($mesabonnements2 as $UserData2)
        {
            $idPublication2[] = $UserData2['publication_id'];
        }
        curl_close($ch2);



        $url= "http://10.0.10.110/journaux/public/api/magazine/filtrer";

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
            CURLOPT_POSTFIELDS =>"titre=$laValeurRecherchee",
        );

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);

        $publications = json_decode(curl_exec($ch), true)['result'];

        curl_close($ch);

        return view('magazine')->with('publications', $publications)->with('mesabonnements', $mesabonnements2);


    }


}