<?php

namespace App\Helpers;

use Carbon\Carbon;

class Ipaymu
{
    public static function getIpaymu($user,$topup)
    {

        $va     = env('VA_IPAYMU'); //get on iPaymu dashboard
        $secret = env('KEY_IPAYMU'); //get on iPaymu dashboard

        $url    = env('URL_IPAYMU'); //url
        $method = 'POST'; //method

        //Request Body//
        $body['referenceId']     = $topup->code;
        $body['product']     = array('Topup Coin');
        $body['qty']         = array('1');
        $body['price']       = array($topup->price);
        $body['description'] = array('Topup coin sejumlah '.$topup->coin);
        $body['returnUrl']   = url('/?payment=return');
        $body['cancelUrl']   = url('/?payment=cancel');
        $body['notifyUrl']   = url('api/confirm');
        $body['buyerName']   = $user->name;
        $body['buyerEmail']  = $user->email;
        $body['buyerPhone']  = $user->phone;
        //End Request Body//

        //Generate Signature
        // *Don't change this
        $jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
        $requestBody  = strtolower(hash('sha256', $jsonBody));
        $stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $secret;
        $signature    = hash_hmac('sha256', $stringToSign, $secret);
        $timestamp    = Date('YmdHis');
        //End Generate Signature

        $ch = curl_init();

        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'va: ' . $va,
            'signature: ' . $signature,
            'timestamp: ' . $timestamp,
        );

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_POST, count($body));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $err = curl_error($ch);
        $req = curl_exec($ch);
        curl_close($ch);
        $response = array();
        //$response[]
        
        $response = json_decode($req);

        return $response;
    }
}
