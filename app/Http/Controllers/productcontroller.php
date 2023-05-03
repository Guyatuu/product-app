<?php
namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
class ProductController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$products= Products::latest()->paginate(5);
return view('products.index',compact('products'));
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('products.create');
}
/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$request->validate([
'name' => 'required',
'detail' => 'required',
]);
Products::create($request->all());
return redirect()->route('products.index')
->with('success','Product created
successfully.');
}
/**
* Display the specified resource.
*
* @param \App\Models\Product $products
* @return \Illuminate\Http\Response
*/
public function show(Product $products)
{
return view('products.show',compact('products'));
}
/**
* Show the form for editing the specified resource.
*
* @param \App\Models\Products $products
* @return \Illuminate\Http\Response
*/
public function edit(Product $products)
{
return view('products.edit',compact('product'));
}
/**
* Update the specified resource in storage.
*
* @param \Illuminate\Http\Request $request
* @param \App\Models\Products $products
* @return \Illuminate\Http\Response
*/
public function update(Request $request, Products $products)
{
$request->validate([
'name' => 'required',
'detail' => 'required',
]);
$products->update($request->all());
return redirect()->route('products.index')
->with('success','Product updated
successfully');
}
/**
* Remove the specified resource from storage.
*
* @param \App\Models\Products $products
* @return \Illuminate\Http\Response
*/
public function destroy(Product $products)
{
$products->delete();
return redirect()->route('products.index')
->with('success','Product deleted
successfully');
}
}

