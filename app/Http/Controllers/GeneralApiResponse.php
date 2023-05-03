<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralApiResponse extends Controller
{
    public static function generalErrorResponse($massage,$status_code,$data=null){
        //status code 0 => success
        return response()->json([
            "message"=>$massage,
            "status_code"=>$status_code,
            "data"=>$data
        ])->setStatusCode(200);
    }

    public static function generalSuccessResponse($massage,$status_code,$data){
        return response()->json([
            "message"=>$massage,
            "status_code"=>$status_code,
            "data"=>$data
        ])->setStatusCode(200);
    }
}
