<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MakeupController extends Controller
{
    
    public function index()
    {
        $data = $this->getProducts();

        return $data;
    }

    
    private function getProducts()
    {
        $urlEnv = env('API_URL');
        $ext = ".json";

        $url = "{$urlEnv}{$ext}";

        $response = Http::get($url);
        $products = json_decode($response);

        return $products;
        
    }
    
    private function getHeaders()
    {

        $header = [
            'Content-Type' => 'application/json',
        ];

        return $header;
    }
}
