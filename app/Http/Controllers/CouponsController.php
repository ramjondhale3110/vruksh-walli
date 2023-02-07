<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use DataTables;

class CouponsController extends Controller
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
        $banner = new Coupon();
        $banner->coupon_type = $request->coupon_type;
        $banner->code = $request->code;
        $banner->title = $request->title;
        $banner->coupon_discount_type = $request->coupon_discount_type;
        $banner->start_date = $request->start_date;
        $banner->expire_date = $request->expire_date;
        $banner->coupon_discount = $request->coupon_discount;
        $banner->limit_same_user = $request->limit_same_user;
        $banner->minimum_purchase = $request->minimum_purchase;
        $banner->save();
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
    public function update(Request $request,$id)
    {
        $coupon = Coupon::find($id);
        $coupon->coupon_type = $request->coupon_type;
        $coupon->code = $request->code;
        $coupon->title = $request->title;
        $coupon->coupon_discount_type = $request->coupon_discount_type;
        $coupon->start_date = $request->start_date;
        $coupon->expire_date = $request->expire_date;
        $coupon->coupon_discount = $request->coupon_discount;
        $coupon->limit_same_user = $request->limit_same_user;
        $coupon->minimum_purchase = $request->minimum_purchase;
        $coupon->save();
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
    public function getAddCoupon(Request $request){

        return view('admin.coupon.add');
    }

    public function getAllCoupon(Request $request){
        $coupon = Coupon::get();
        return view('admin.coupon.all');
    }

    public function getAllCouponData(Request $request){
        $coupon = Coupon::get();
        return DataTables::of($coupon)->make(true);
    }

    public function getEditCoupon(Request $request,$id){
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit')->with('coupon',$coupon);
    }
}
