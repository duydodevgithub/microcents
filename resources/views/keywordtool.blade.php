@extends('layouts.master')

@section("content")
    
    <div class="container">
            @if(count($errors->all()))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <div class="text-center">
                <form action="{{ route('keywordtool') }}" method="POST" style="margin-top: 20px;">
                    <div class="form-group">
                        <input name="keyword" type="text" class="form-control" placeholder="Search">
    
                        {{ csrf_field() }}
                    </div>
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>

            
    </div>
    <?php 
        // $queryFields = [
        // "scope" => "licenses.create,licenses.view,purchases.view",
        // "state" => "demo_" . microtime(true),
        // "response_type" => "code",
        // "redirect_uri" => "http://localhost:8888/keywordtool",
        // "client_id" => "41f42-4d6f7-db426-46195-deabd-76797"
        // ];

        // $options = [
        // CURLOPT_URL => "https://api.shutterstock.com/v2/oauth/authorize?" . http_build_query($queryFields),
        // CURLOPT_USERAGENT => "php/curl",
        // CURLOPT_RETURNTRANSFER => 1
        // ];

        // $handle = curl_init();
        // curl_setopt_array($handle, $options);
        // $response = curl_exec($handle);
        // curl_close($handle);


        // print_r($response);

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

    @isset($imgArr)
        @if(count($imgArr) > 0)
            <div class="text-center" style="margin-top: 20px;">
                @foreach($imgArr as $element)
                    <img src="{{ $element->assets->preview->url }}">
                @endforeach
            </div>
        @endif
    @endisset

@endsection