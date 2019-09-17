@extends('layouts.master')

@section("content")
    <div class="container">
            <form action="{{ route('keywordtool') }}" method="POST" style="margin-top: 20px;">
                <div class="form-group">
                    <input name="keyword" type="text" class="form-control" placeholder="Search">

                    {{ csrf_field() }}
                </div>
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
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
        // "code" => "FY0daFe0he7yk8JDNZ1kwz"
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



        //get image details
        $SHUTTERSTOCK_API_TOKEN = "v2/NDFmNDItNGQ2ZjctZGI0MjYtNDYxOTUtZGVhYmQtNzY3OTcvMjQ0NjU0MTgyL2N1c3RvbWVyLzMvMUozX3Y4ZjAtU0s1OHNWMzc0MXZBck56UngtTFM0MnhlOEdIc3BZR2VSUVZPd0ZFQmJJUHhkMGdhTkx2dENMYjJaSnZJTm1xS29OMFk4RVA4bTRTSTBHUjFicWZTVmNrTHpDeWdXanFibHlzVk12ci1zZTExbTRxbmdCV25aQ2duWDQwLVhBVWNtUEllNzczLTk2a29wWm5oUDZVZkhsY2VJUmYxZ1FJLW8zT0EzMkdndWdxR0NyZWY2QmRERzZZNzFIbUNVUC03OWYzTWN1Y2Rlelo5Zw";
        
        // $options = [
        // CURLOPT_URL => "https://api.shutterstock.com/v2/images/1488597566",
        // CURLOPT_USERAGENT => "php/curl",
        // CURLOPT_HTTPHEADER => [
        //     "Authorization: Bearer $SHUTTERSTOCK_API_TOKEN"
        // ],
        // CURLOPT_RETURNTRANSFER => 1
        // ];

        // $handle = curl_init();
        // curl_setopt_array($handle, $options);
        // $response = curl_exec($handle);
        // curl_close($handle);

        // $decodedResponse = json_decode($response);
        // echo("<pre>"); 
        // print_r($decodedResponse);
        // echo("</pre>");
    ?>

    @if(Session::has('info'))
        <p>Image for keyword: {{ Session::get('info') }}</p>
        <?php
        $queryFields = [
        "query" => Session::get('info'),
        "sort" => "popular",
        "orientation" => "horizontal",
        "per_page" => 500
        ];

        $options = [
        CURLOPT_URL => "https://api.shutterstock.com/v2/images/search?" . http_build_query($queryFields),
        CURLOPT_USERAGENT => "php/curl",
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer $SHUTTERSTOCK_API_TOKEN"
        ],
        CURLOPT_RETURNTRANSFER => 1
        ];

        $handle = curl_init();
        curl_setopt_array($handle, $options);
        $response = curl_exec($handle);
        curl_close($handle);

        $decodedResponse = json_decode($response);

        // echo("<pre>");
        // print_r($decodedResponse);
        // echo("</pre>");

        foreach($decodedResponse->data as $key) {
            echo("<img src='" . $key->assets->preview->url ."'>");
        }
        ?>
        
    @endif
@endsection