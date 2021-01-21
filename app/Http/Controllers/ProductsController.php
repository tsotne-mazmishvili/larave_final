<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("products.index",["products"=>Product::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>"required",
            "price"=>"required|max:2000"
        ]);

          if(Input::file("image")){
            $dest=public_path("images");
            $filename=uniqid().".jpg";
            $img=Input::file("image")->move($dest, $filename);
        }

        Product::create([
            "name"=>$request->input("name"),
            "price"=>$request->input("price"),
            "image"=>$filename,
            "category_id"=>1,
            "description"=>$request->input("description")
        ]);


        return redirect()->route("products");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::where("id",$id)->firstOrFail();
        return view("products.edit",["product"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Product::where("id",$request->input("id"))->update([
            "name"=>$request->input("name"),
            "price"=>$request->input("price"),
            "image"=>$filename,
            "category_id"=>1,
            "description"=>$request->input("description")
        ]);
        return redirect()->route("products");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Product::where("id",$request->input("id"))->delete();
        return redirect()->back();   
    } 
}
