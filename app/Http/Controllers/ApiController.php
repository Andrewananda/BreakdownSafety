<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function getServices() {
        if (auth()->user()) {
            return GeneralApiResponse::generalSuccessResponse('services', 1, Service::all());
        }else {
            return GeneralApiResponse::generalErrorResponse('Unauthorised', 401);
        }
    }

    public function fetchServiceProviders() {
        if(!auth()->user()) {
            $this->unauthorisedResponse();
        }
        $serviceProviders = ServiceProvider::with(['location', 'gallery'])->get();
        return GeneralApiResponse::generalSuccessResponse('service providers', 1, $serviceProviders);
    }

    public function order(Request $request) {
        if (!auth()->user()) {
            $this->unauthorisedResponse();
        }
        $validation = Validator::make($request->all(), [
            'lat'=>'required',
            'lon'=>'required',
            'service_provider_id' => 'required',
            'description' => 'required'
        ]);

        if($validation->fails()) {
            return GeneralApiResponse::generalErrorResponse($validation->errors()->first(), 0);
        }

        $order = new Order();
        $order->lat = $request->post('lat');
        $order->lon = $request->post('lon');
        $order->service_provider_id = $request->post('service_provider_id');
        $order->description = $request->post('description');
        $order->order_id = $this->generateRandomString(5);
        $order->user_id = auth()->user()->id;
        $order->save();

        return GeneralApiResponse::generalSuccessResponse('Order placed successfully', 1, $order);
    }





    private function unauthorisedResponse() {
        return GeneralApiResponse::generalErrorResponse('Unauthorised', 401);
    }

   private function generateRandomString($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
