<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class TranslateController extends Controller
{
    public function index(Request $request,$lang)
    {

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://translate.yandex.net/api/v1/tr.json/translate?id=d3074b64.5fc79091.0de92d9a.74722d74657874-0-0&srv=tr-text&lang='.$lang.'&reason=auto&format=text',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'text='.$request->text.'&options=4',
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
return json_decode($response,true)['text'][0];
    }


    public function categories(){
        return view('categories');
    }
    public function topic(){
        return view('topic');
    }
}
