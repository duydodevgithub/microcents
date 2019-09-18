@extends('layouts.master')

@section('content')

<?php 
        $queryFields = [
        "scope" => "licenses.create,licenses.view,purchases.view",
        "state" => "demo_" . microtime(true),
        "response_type" => "code",
        "redirect_uri" => "http://localhost:8888/keywordtool",
        "client_id" => "41f42-4d6f7-db426-46195-deabd-76797"
        ];

        $options = [
        CURLOPT_URL => "https://api.shutterstock.com/v2/oauth/authorize?" . http_build_query($queryFields),
        CURLOPT_USERAGENT => "php/curl",
        CURLOPT_RETURNTRANSFER => 1
        ];

        $handle = curl_init();
        curl_setopt_array($handle, $options);
        $response = curl_exec($handle);
        curl_close($handle);


        print_r($response);

        //get access token

        // $body = [
        // "client_id" => "41f42-4d6f7-db426-46195-deabd-76797",
        // "client_secret" => "50b6f-5b2ce-9afcc-dea62-717aa-1ab32",
        // "grant_type" => "authorization_code",
        // "code" => "Idd4RqCukK4tizu17uhQp3"
        // ];
        // $encodedBody = http_build_query($body);

        // $options = [
        // CURLOPT_URL => "https://api.shutterstock.com/v2/oauth/access_token",
        // CURLOPT_CUSTOMREQUEST => "POST",
        // CURLOPT_POSTFIELDS => $encodedBody,
        // CURLOPT_USERAGENT => "php/curl",
        // CURLOPT_RETURNTRANSFER => 1
        // ];

        // $handle = curl_init();
        // curl_setopt_array($handle, $options);
        // $response = curl_exec($handle);
        // curl_close($handle);

        // $decodedResponse = json_decode($response);
        // echo("<pre>");
        // print_r($decodedResponse);
        // echo("</pre>")

    ?>

@endsection