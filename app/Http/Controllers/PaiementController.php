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
        $url = "http://journaux.dev/api/client/panier/$id";

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
        $clientid = request()->only('clientid')['clientid'];
        $uuid = request()->only('uuid')['uuid'];
        $cid = request()->only('cid')['cid'];
        $cardnumber = request()->only('cardnumber')['cardnumber'];
        $cardmonth = request()->only('cardmonth')['cardmonth'];
        $cardyear = request()->only('cardyear')['cardyear'];
        $amount = request()->only('amount')['amount'];

//        dd($clientid,$uuid,$cid,$cardnumber,$cardmonth,$cardyear,$amount);

        $ch = curl_init();
        $url = "http://journaux.dev/api/client/paiementfinal";

        // configuration des options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "clientid=$clientid&&uuid=$uuid&cid=$cid&cardnumber=$cardnumber&cardmonth=$cardmonth&cardyear=$cardyear&amount=$amount");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        $content = curl_exec($ch);
        $content = json_decode(curl_exec($ch), true)['result'];

        curl_close($ch);

        if($content=='ErreurPaiement')
        {
            return redirect('/client/panier/'.$clientid)->with('errorPaiement', 'Paiement Incorrect');
        }
        else {
            return redirect('/client/panier/'.$clientid)->with('okPaiement', 'Paiement Ok');


        }

    }


}