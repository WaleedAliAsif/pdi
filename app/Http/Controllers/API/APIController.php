<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatientReport;

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
            $var1 = 'yes';
            $response['Ditected'] = 'Yes';
        }
        else{
            $var1 = 'No';
            $response['Ditected'] = 'No';
        }
        $test_id = $request->test_id;
        $image = $request->image;
        $name = $request->name;
        $test = $request->test;
        
        $tesst = PatientReport::find($test_id);
      
            $tesst->result = $var1;
            $tesst->save();
      
        
        $response["data"] = [
            'id' => $test_id,
            'name' => $name,
            'test' => $test,
            'image' => 'https://pdidentifier.tech/'.$image
        ];

        $response['success'] = 1;

        return json_encode($response);
}
       
}
