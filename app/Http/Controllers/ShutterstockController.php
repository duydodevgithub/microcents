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

        print_r($images);

        // return view('keywordtool', ['$images' => $images]);

    }

    public function getContributorDetail(Request $request){
        $this->validate($request,[
            'contributor_id' => 'required'
        ]);

        // print_r($request->get('contributor_id'));

        $shutterstock = new Shutterstock();

        $contributorData = $shutterstock->getContributorDetail($request->get('contributor_id'));

        // print_r($contributorData);
    }
}
