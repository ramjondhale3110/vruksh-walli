<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use DataTables;

class BrandController extends Controller
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
        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_logo = $request->brand_logo;
             
        if ($request->hasFile('brand_logo')) {
            $image = $request->file('brand_logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/admins/images/gallery'), $image_name);
            $profile = "/admins/images/gallery/" . $image_name;
            $brand->brand_logo = $profile;
        }
        $brand->save(); 
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
       //$id = $request->brand_id;
        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_logo = $request->brand_logo;
        if ($request->hasFile('brand_logo')) {
            $image = $request->file('brand_logo');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/admins/images/gallery'), $image_name);
            $profile = "/admins/images/gallery/" . $image_name;
            $brand->brand_logo = $profile;
        }
        $brand->save();
        return view('admin.brand.edit')->with('brand',$brand);
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

    public function getAddBrand(Request $request){
        
        return view('admin.brand.add');
    }

    public function postAddBrand(Request $request){
        
        
    }
 
    public function getdataTable(Request $request){
        $brand = Brand::where('is_active',1)->get();
        return DataTables::of($brand)->make(true); 
       
    }
    public function getAlldata(Request $request){

        $brand = Brand::where('is_active',1)->get();
      
        return view('admin.brand.all'); 
       
    }

    public function getEditBrand(Request $request){
        $id = $request->brand_id;
        $brand = Brand::find($id);
        return view('admin.brand.edit')->with('brand',$brand);
    }

    
}
