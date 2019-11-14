<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function send_mobily_sms($phone, $content)
    {
    	$apikey='65326e5918a86d8b061e0c356bedd763';
    	$encoded_msg=json_encode($content, JSON_UNESCAPED_UNICODE |JSON_PRETTY_PRINT);
    	$client = new \GuzzleHttp\Client();
		$res = $client->request('GET', "https://alfa-cell.com/api/msgSend.php?apiKey=$apikey&numbers=$phone&sender=awamer&msg=$encoded_msg&timeSend=0&dateSend=0&applicationType=68&domainName=awamer.net&returnJson=1&lang=3",
			['headers' => ['Accept'     => 'application/json;charset=utf-8'] ]
		 );
 		return $res->getBody();
		$res->getStatusCode();  // 200 is sent
    }
}
