<?php

namespace App\Http\Controllers;

use App\Shutterstock;

use Illuminate\Http\Request;

use Illuminate\Http\Store;

class ShutterstockController extends Controller
{
    //
    public function getImages(Request $request){
        $this->validate($request,[
            'keyword' => 'required'
        ]);

        $shutterstock = new Shutterstock();

        $images = $shutterstock->getImages($request->input('keyword'));

        // echo("<pre>"); 
        // print_r($images);
        // echo("</pre>");
        return view('keywordtool', ['imgArr' => $images]);

    }

    public function getContributorId(Request $request){
        $this->validate($request,[
            'profile_url' => 'required'
        ]);

        // print_r($request->get('contributor_id'));

        $shutterstock = new Shutterstock();

        $contributorId = $shutterstock->getContributorId($request->get('profile_url'));

        print_r($contributorId);
    }
}
