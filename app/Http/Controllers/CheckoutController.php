<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect; // Giống return, trả về 1 trang gì đó
use Gloudemans\Shoppingcart\Facades\Cart; // chú ý: cái này cài từ https://packagist.org/packages/bumbummen99/shoppingcart
session_start();

class CheckoutController extends Controller
{
    public function checkout()
    {
        // Cái này để load layout thôi
        $product_category_list = DB::table('product_category')->orderby('product_category_id', 'desc')->get();
        $sub_brand_list = DB::table('brand')->where('sub_brand', '!=' , 0)->orderby('brand_id', 'desc')->get();
        $main_brand_list = DB::table('brand')->where('sub_brand', 0)->orderby('brand_id', 'desc')->get();

        return view('client.checkout')
        ->with('sub_brand_list',  $sub_brand_list )
        ->with('main_brand_list', $main_brand_list)
        ->with('product_category_list', $product_category_list);
    }
}
