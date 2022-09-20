<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getUsers(){
        return response()->json([
            'message' => 'Hello World'
        ]);
    }
    public function receiveReport(Request $request){
        $response = array();
        $number = rand(0,4);
        if($number <= 2){
            $response['Ditected'] = 'Yes';
        }
        else{
            $response['Ditected'] = 'No';
        }
        
        $image = $request->image;
        $name = $request->name;
        $test = $request->test;
        $response["data"] = [
            'name' => $name,
            'test' => $test,
            'image' => 'https://pdidentifier.tech/'.$image
        ];

        $response['success'] = 1;

        return json_encode($response);
}
       
}
