<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    // $categories= Category::get();
    $categories = Category::all();
    return response()->json($categories);
}

/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$validateData = $request->validate([
'category_name' => 'required|unique:categories|max:255',
]);

$category = new Category;
$category->category_name = $request->category_name;
$category->save();
}

/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
    
$category = DB::table('categories')->where('id', $id)->first();
return response()->json($category);
}

/**
* Update the specified resource in storage.
*
* @param \Illuminate\Http\Request $request
* @param int $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$data = array();
$data['category_name'] = $request->category_name;
$user = DB::table('categories')->where('id', $id)->update($data);
}

/**
* Remove the specified resource from storage.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
DB::table('categories')->where('id', $id)->delete();
}
}