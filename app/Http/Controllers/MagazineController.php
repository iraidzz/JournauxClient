<?php
/**
 * Created by PhpStorm.
 * User: loick
 * Date: 26/06/2017
 * Time: 15:16
 */

namespace App\Http\Controllers;


class MagazineController
{

    public function DisplayMagazine()
    {

        $url = "http://journaux.dev/api/magazine/lister";

        $options = array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HEADER => false,  // don't return headers
            CURLOPT_FOLLOWLOCATION => true,   // follow redirects
            CURLOPT_MAXREDIRS => 10,     // stop after 10 redirects
            CURLOPT_ENCODING => "",     // handle compressed
            CURLOPT_USERAGENT => "test", // name of client
            CURLOPT_AUTOREFERER => true,   // set referrer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
            CURLOPT_TIMEOUT => 120,    // time-out on response
        );

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);

        $publication = json_decode(curl_exec($ch), true);

        curl_close($ch);

        return view('magazine')->with('publication', $publication);
    }


}