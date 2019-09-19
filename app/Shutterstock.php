<?php

namespace App;


class Shutterstock
{
    public function getImages($keyword){
        $queryFields = [
            "query" => $keyword,
            "sort" => "newest",
            "per_page" => 100,
            "contributor" => "167353528"
            ];
    
            $options = [
            CURLOPT_URL => "https://api.shutterstock.com/v2/images/search?" . http_build_query($queryFields),
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
          print_r($decodedResponse->portfolio_url);
          echo("</pre>");  

    }

    public function getContributorId($profileUrl) {
        // $curl = curl_init('http://testing-ground.scraping.pro/textlist?ver=2');
        $curl = curl_init('https://www.shutterstock.com/g/Nhutle');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        
        $page = curl_exec($curl);
        
        if(curl_errno($curl)) // check for execution errors
        {
            echo 'Scraper error: ' . curl_error($curl);
            exit;
        }
        
        curl_close($curl);
        
        $regex = '/<div class="contrib-thumb" style="background-image: url\(\'\/\/ak.picdn.net\/contributors\/(.*?)\/avatars\/thumb.jpg\'\)"><\/div>/s';
        if ( preg_match($regex, $page, $list))
            return ($list[1]);
        else 
            return "Not found"; 
    }
}

//contributor id - page source contributors&quot;:

//langdu: 3207713