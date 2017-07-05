<?php
/**
 * Created by PhpStorm.
 * User: loick
 * Date: 28/06/2017
 * Time: 13:41
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{

    public function Authentifier(Request $request)
    {

        $ch = curl_init();
        // configuration des options
        curl_setopt($ch, CURLOPT_URL, "http://journaux.dev/api/client/authentifier");
//        curl_setopt($ch, CURLOPT_URL, "http://10.0.10.110/api/client/authentifier");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        // data à envoyer
        $data = [];
        $data['user']['email'] = request()->only('email')['email'];
        $data['user']['password'] = request()->only('password')['password'];

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        // exécution de la session : $content est le retour de l'api
        $content = json_decode(curl_exec($ch), true)['result'];

        // fermeture de la session
        curl_close($ch);

        if($content=='ErreurConnexion')
        {
            return redirect('/login');
        }
        else
        {
            foreach($content as $UserData)
            {
                $cookie = Cookie::make('CookieName', $UserData['name']);
                $cookieid = Cookie::make('CookieId', $UserData['id']);

            }

            return redirect('/client/mesabonnements/'.$UserData['id'])->withCookie($cookie)->withCookie(($cookieid));
        }



    }
    public function Logout()
    {
        if (isset($_COOKIE['CookieName']) || isset($_COOKIE['CookieId'])) {
            unset($_COOKIE['CookieName']);
            unset($_COOKIE['CookieId']);
            setcookie('CookieName', '', time() - 3600, '/'); // empty value and old timestamp
            setcookie('CookieId', '', time() - 3600, '/'); // empty value and old timestamp
        }

        return redirect('/login');

    }
}