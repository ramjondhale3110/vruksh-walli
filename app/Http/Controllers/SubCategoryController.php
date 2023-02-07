<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use DataTables;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $subcategory = new subCategory();
        $subcategory->sub_category_name = $request->sub_category_name;
        $subcategory->sub_priority_no = $request->sub_priority_no; 
        $subcategory->category_id = $request->category_id; 
        $subcategory->save();

        return redirect()->back();
        return view('admin.subcategory.add');
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


    public function getsubcategory(Request $request){
   
  
        $category_id = $request->category_id;     
        $area='';
        $cities_area = SubCategory::where('category_id', $category_id)->where('is_active', 1)->get();
        $area .= '<option value="">Select SubCategory</option>';
        foreach ($cities_area as $dist) 
        {
            $area .= '<option value="'.$dist->sub_category_id.'">'.$dist->sub_category_name.'</option>';
        }
        return response()->json(['area' => $area]);
    }

    public function update(Request $request, $id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->sub_category_name = $request->sub_category_name;
        $subcategory->sub_priority_no = $request->sub_priority_no; 
        $subcategory->category_id = $request->category_id; 
        $subcategory->save();
        return redirect('admin/subcategory/all');
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

    public function getAddSubCategory(Request $request){
        $subcategory = Category::get();
        return view('admin.subcategory.add')->with('subcategory',$subcategory);
    }

    public function getSubcategoryAllData(Request $request){
        $subcategory = SubCategory::get();
        return view('admin.subcategory.all');
    }

    public function getAllSubcategorydataTable(Request $request){
        $subcategory = SubCategory::get();
        return DataTables::of($subcategory)->make(true);
    }

    public function getEditSubcategory(Request $request){

        $id = $request->sub_category_id;

        $subcategory = SubCategory::where('sub_category_id',$id)->with('category')->first();
       return view('admin.subcategory.edit')->with('subcategory',$subcategory);
    }

}
