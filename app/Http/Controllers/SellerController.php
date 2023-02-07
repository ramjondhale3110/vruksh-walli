<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use DataTables;


class SellerController extends Controller
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
        $seller = new Seller();
        $seller->seller_first_name = $request->seller_first_name;
        $seller->seller_last_name = $request->seller_last_name;
        $seller->seller_email = $request->seller_email;
        $seller->seller_contact_no = $request->seller_contact_no;
        $seller->seller_shop_name = $request->seller_shop_name;
        $seller->seller_address = $request->seller_address;
        $seller->seller_logo_img = $request->seller_logo_img;
        $seller->seller_upload_image = $request->seller_upload_image;
        $seller->seller_banner_img = $request->seller_banner_img;
        $seller->save();

        if($files=$request->file('seller_logo_img'))
        {
        $fileName = time().$request->file('seller_logo_img')->getClientOriginalName();
        $path = $request->file('seller_logo_img')->storeAs('public/seller_logo_img',$fileName);
        $seller['seller_logo_img'] = $path;   
        }

        if($files=$request->file('seller_upload_image'))
        {
        $fileName = time().$request->file('seller_upload_image')->getClientOriginalName();
        $path = $request->file('seller_upload_image')->storeAs('public/seller_upload_image',$fileName);
        $seller['seller_upload_image'] = $path;   
        }

        if($files=$request->file('seller_banner_img'))
        {
        $fileName = time().$request->file('seller_banner_img')->getClientOriginalName();
        $path = $request->file('seller_banner_img')->storeAs('public/seller_banner_img',$fileName);
        $seller['seller_banner_img'] = $path;   
        }
        $seller->save();
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
        $seller = Seller::find($id);
        $seller->seller_first_name = $request->seller_first_name;
        $seller->seller_last_name = $request->seller_last_name;
        $seller->seller_email = $request->seller_email;
        $seller->seller_contact_no = $request->seller_contact_no;
        $seller->seller_shop_name = $request->seller_shop_name;
        $seller->seller_address = $request->seller_address;
        $seller->seller_logo_img = $request->seller_logo_img;
        $seller->seller_upload_image = $request->seller_upload_image;
        $seller->seller_banner_img = $request->seller_banner_img;
        $seller->save();

        if($files=$request->file('seller_logo_img'))
        {
        $fileName = time().$request->file('seller_logo_img')->getClientOriginalName();
        $path = $request->file('seller_logo_img')->storeAs('public/seller_logo_img',$fileName);
        $seller['seller_logo_img'] = $path;   
        }

        if($files=$request->file('seller_upload_image'))
        {
        $fileName = time().$request->file('seller_upload_image')->getClientOriginalName();
        $path = $request->file('seller_upload_image')->storeAs('public/seller_upload_image',$fileName);
        $seller['seller_upload_image'] = $path;   
        }

        if($files=$request->file('seller_banner_img'))
        {
        $fileName = time().$request->file('seller_banner_img')->getClientOriginalName();
        $path = $request->file('seller_banner_img')->storeAs('public/seller_banner_img',$fileName);
        $seller['seller_banner_img'] = $path;   
        }
        $seller->save();
        return redirect()->back();
        
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

    public function getAddSeller(Request $request){
        return view('admin.seller.add');
    }

    public function getEditSeller(Request $request){
        $id = $request->seller_id;
        $seller = Seller::find($id);
        return view('admin.seller.edit')->with('seller',$seller);

    }

    public function getAllSeller(Request $request){
        $seller = Seller::get();
        return view('admin.seller.all');
    }

    public function getAllSellerData(Request $request){
        $seller = Seller::get();
        return DataTables::of($seller)->make(true); 
        
    }
}
