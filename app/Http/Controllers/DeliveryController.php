<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\DeliveryMan;
use DataTables;
use Hash;

class DeliveryController extends Controller
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
        $delivery = new DeliveryMan();
        $delivery->deliveryman_name = $request->deliveryman_name;
        $delivery->deliveryman_last_name = $request->deliveryman_last_name;

        $delivery->full_name = $request->deliveryman_name." ".$request->deliveryman_last_name;

        $delivery->deliveryman_email = $request->deliveryman_email;
        $delivery->deliveryman_phone = $request->deliveryman_phone;
        $delivery->deliveryman_identity_type = $request->deliveryman_identity_type;
        $delivery->deliveryman_identity_no = $request->deliveryman_identity_no;
        $delivery->delivery_password = $request->delivery_password;
        $delivery->deliveryman_identity_img = $request->deliveryman_identity_img;
        $delivery->deliveryman_img = $request->deliveryman_img;
        $delivery_password = Hash::make($request->delivery_password); 
        $delivery->delivery_password=$delivery_password;

        if ($request->hasFile('deliveryman_identity_img')) {
            $image = $request->file('deliveryman_identity_img');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/admins/images/deliveryman_identity_img'), $image_name);
            $profile = "/admins/images/deliveryman_identity_img/" . $image_name;
            $delivery->deliveryman_identity_img = $profile;
        }

        if ($request->hasFile('deliveryman_img')) {
            $image = $request->file('deliveryman_img');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/admins/images/deliveryman_img'), $image_name);
            $profile = "/admins/images/deliveryman_img/" . $image_name;
            $delivery->deliveryman_img = $profile;
        }
       
        
        $delivery->save();
        return redirect('admin/delivery/all');
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
        $delivery = DeliveryMan::find($id);
        $delivery->deliveryman_name = $request->deliveryman_name;
        $delivery->deliveryman_last_name = $request->deliveryman_last_name;
        $delivery->deliveryman_email = $request->deliveryman_email;
        $delivery->deliveryman_phone = $request->deliveryman_phone;
        $delivery->deliveryman_identity_type = $request->deliveryman_identity_type;
        $delivery->deliveryman_identity_no = $request->deliveryman_identity_no;
        $delivery->delivery_password = $request->delivery_password;
        $delivery_password = Hash::make($request->delivery_password); 
        $delivery->delivery_password=$delivery_password;

       
        if ($file = $request->file('deliveryman_identity_img')) {
            $fileName = time().$request->file('deliveryman_identity_img')->getClientOriginalName();
            $path = $request->file('deliveryman_identity_img')->storeAs('public/deliveryman_identity_img',$fileName);
            $category['deliveryman_identity_img'] = $path;
        }
        if ($file = $request->file('deliveryman_img')) {
            $fileName = time().$request->file('deliveryman_img')->getClientOriginalName();
            $path = $request->file('deliveryman_img')->storeAs('public/deliveryman_img',$fileName);
            $category['deliveryman_img'] = $path;
        }

        $delivery->save();
        return redirect('admin/delivery/all');
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

    public function getAddDelivery(Request $request){
        return view('admin.delivery.add');
    }

    public function getAUpdateDelivery(Request $request){
        $delivery_men_id = $request->delivery_men_id;
        $delivery = DeliveryMan::find($delivery_men_id);
        return view('admin.delivery.edit')->with('delivery',$delivery);
    }

    public function getAllDelivery(Request $request){
        $delivery = DeliveryMan::get();
        return view('admin.delivery.all');
    }
    public function getAllDeliveryData(Request $request){
        $delivery = DeliveryMan::get();
        return DataTables::of($delivery)->make(true);
    }
}
