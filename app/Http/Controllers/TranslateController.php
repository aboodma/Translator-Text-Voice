<?php

namespace App\Http\Controllers;

use App\Visitor;
use Illuminate\Http\Request;

class TranslateController extends Controller
{

    public function welcome(Request $request)
    {


        if (!isset(Visitor::where('ip', $request->visitor()->ip())->first()->ip)) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://www.iplocate.io/api/lookup/' . $request->visitor()->ip(),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,

                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Cookie: __cfduid=de191f4e04861f2d1447a470ee4859a1d1607514590'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $jso = json_decode($response, true);
            $country = $jso['country'];
            $vis = new Visitor();
            $vis->ip = $request->visitor()->ip();
            $vis->device = $request->visitor()->device();
            $vis->country = $country;
            $vis->save();
        } else {
            $vis = Visitor::where('ip', $request->visitor()->ip())->first();
        }
        $vis->visit(); // create a visit log
        return view('welcome');
    }

    public function index(Request $request, $lang)
    {
        return $this->translate_yandex($request->text,$lang);

    }


    public function categories()
    {
        return view('categories');
    }

    public function topic()
    {
        return view('topic');
    }

    public function translate_bing($text, $from, $to)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.bing.com/ttranslatev3?isVertical=1&&
              IG=ACD380CD436E4CE4B7B4DFC6BF7C9F2C&
              IID=translator.5023.1',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => "fromLang=$from&text=$text&to=$to",
            CURLOPT_HTTPHEADER => array(
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0',
                'Accept: */*',
                'Accept-Language: en-US,en;q=0.5',
                'Referer: https://www.bing.com/translator/?text=r&from=en&to=es',
                'Content-type: application/x-www-form-urlencoded',
                'Origin: https://www.bing.com',
                'DNT: 1',
                'Connection: keep-alive',
                'Cookie: MUID=30F6EA625C0B65840E20E5155DCE64A7; MUIDB=30F6EA625C0B65840E20E5155DCE64A7; _EDGE_V=1; SRCHD=AF=NOFORM; SRCHUID=V=2&GUID=22E1C47713A248808198329CB4B58BC0&dmnchg=1; SRCHUSR=DOB=20201125; _tarLang=default=es; _TTSS_IN=hist=WyJlbiIsImF1dG8tZGV0ZWN0Il0=; _TTSS_OUT=hist=WyJhciIsImVzIl0=; _SS=SID=34A505830C42695E1D930A180DDB6844; _EDGE_S=SID=34A505830C42695E1D930A180DDB6844; btstkn=EMmbt9lv2mk7QhY5uNbJoWr4CeNkD4rTGnxLuoWVPiD7uKJkKpc0DtwR8MJYdHsS',
                'Pragma: no-cache',
                'Cache-Control: no-cache',
                'TE: Trailers'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $jso = json_decode($response, true);
        return $jso;
    }
    public function translate_yandex($text,$lang){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://translate.yandex.net/api/v1/tr.json/translate?' .
                'id=dfe2dd58.5fd15b77.8b2240db.74722d74657874-0-0&srv=tr-text&lang=' . $lang . '&reason=auto&format=text',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'text=' . $text . '&options=4',
            CURLOPT_HTTPHEADER => array(
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0',
                'Accept: */*',
                'Accept-Language: en-US,en;q=0.5',
                'Referer: https://translate.yandex.com/?lang=en-ru&text=test',
                'Content-Type: application/x-www-form-urlencoded',
                'Origin: https://translate.yandex.com',
                'DNT: 1',
                'Connection: keep-alive',
                'Pragma: no-cache',
                'Cache-Control: no-cache'
            ),
        ));


        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true)['text'][0];
    }
}
