<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getServices() {
        if (auth()->user()) {
            return GeneralApiResponse::generalSuccessResponse('services', 1, Service::all());
        }else {
            return GeneralApiResponse::generalErrorResponse('Unauthorised', 401);
        }
    }
}
