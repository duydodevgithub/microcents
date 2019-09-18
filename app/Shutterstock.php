<?php

namespace App;


class Shutterstock
{
    public function getImages($keyword){
        $SHUTTERSTOCK_API_TOKEN = "v2/NDFmNDItNGQ2ZjctZGI0MjYtNDYxOTUtZGVhYmQtNzY3OTcvMjQ0NjU0MTgyL2N1c3RvbWVyLzMvRnBVY2tKajBxWmo1bmxoVm0tSEhKMjBiejg2cndZWWtpbmR3RTZnYW1oNEVVZHB6ZWFxX3VLelA4RlZ3SERNRGlkT25EQ3U4RVZDOS01U2V0cUZaUzl3WGVoU0Q0NGpWcGtWeHhhaUhMV09KZEJFeXN4U0lVVWhTTHF6UGlJYktiQko2c0swbXBCd0p6VC1BbXpjdDlwbk9aQlRELUlzdDEwOVZwNi1nT1haYmgyV0dhY1EtUUhyYmJfc3dPM0dWTWFxbXBaWWFUYXNQR3hfZUVRSFNlZw";

        $queryFields = [
            "query" => $keyword,
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

            return $decodedResponse->data;
    }

    public function getContributorDetail($id){
        $options = [
            CURLOPT_URL => "https://api.shutterstock.com/v2/contributors/" . $id,
            CURLOPT_USERAGENT => "php/curl",
            CURLOPT_HTTPHEADER => [
              "Authorization: Bearer " . env('SHUTTERSTOCK_API_TOKEN')
            ],
            CURLOPT_RETURNTRANSFER => 1
          ];
          
          $handle = curl_init();
          curl_setopt_array($handle, $options);
          $response = curl_exec($handle);
          curl_close($handle);
          $decodedResponse = json_decode($response);
          echo("<pre>");
          print_r($decodedResponse);
          echo("</pre>");
    }
}

//contributor id - page source contributors&quot;:

//langdu: 3207713