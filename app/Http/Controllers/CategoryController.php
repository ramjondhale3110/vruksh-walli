<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use DataTables;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->priority_no = $request->priority_no; 
        $category->category_img = $request->category_img;      
        $category->save();

        
        if ($request->hasFile('category_img')) {
            $image = $request->file('category_img');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/admins/images/category_img'), $image_name);
            $profile = "/admins/images/category_img/" . $image_name;
            $category->category_img = $profile;
        }





        $category->save();
        return redirect()->back();
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
        //
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
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->priority_no = $request->priority_no; 
        $category->category_img = $request->category_img;      
        $category->save();

        if ($file = $request->file('category_img')) {
            $fileName = time().$request->file('category_img')->getClientOriginalName();
            $path = $request->file('category_img')->storeAs('public/category_img',$fileName);
            $category['category_img'] = $path;
        }
        $category->save();
        return redirect('cat/all');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAddCategory(Request $request){

        return view('admin.category.add');
    }

    public function getAllData(Request $request){

        $category = Category::get();
        return view('admin.category.all');
    }

    public function getAlldataTable(Request $request){

        $category = Category::get();
        return DataTables::of($category)->make(true); 
    }

    public function getEditCategory(Request $request){

        $id = $request->category_id;
        $category = Category::find($id);
        return view('admin.category.edit')->with('category',$category);
        
    }

}
