<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use App\Helpers\Makeup;


class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        return $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->paginate(15);
        
        return view('app', ['products' => $products]);
        
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
        $product = $this->product->with('ProductColor')->find($product);

        return view('product', ['product' => $product]);
    }   
}
