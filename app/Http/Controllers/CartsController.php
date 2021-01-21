<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use App\Product;
use DB;

class CartsController extends Controller
{
    public function add_to_cart(Request $request)
    {
    	$this->validate($request,[
            "quantity"=>"required|min:1",
        ]);

        Cart::create([
            "user_id"=>Auth::user()->id,
            "product_id"=>$request->input("id"), 
            "quantity"=>$request->input("quantity"),
        ]);

        return redirect()->route("products");

    }

    public function index()
    {
    	$user_id = Auth::user()->id;
    	$data = DB::table('carts')
    	->join('products', 'carts.product_id', '=', 'products.id')
    	->get();
        return view("carts.index",["products"=>$data]);

    }

    public function destroy(Request $request)
    {
        Cart::where("id",$request->input("id"))->delete();
        return redirect()->back();   
    } 
}
