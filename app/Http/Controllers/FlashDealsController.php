<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlashDeals;
use DataTables;

class FlashDealsController extends Controller
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
        $deals = new FlashDeals();
        $deals->flash_title = $request->flash_title;
        $deals->flash_start_date = $request->flash_start_date;
        $deals->flash_end_date = $request->flash_end_date;
        $deals->flash_image = $request->flash_image;
        $deals->save();

        if($files=$request->file('flash_image'))
        {
        $fileName = time().$request->file('flash_image')->getClientOriginalName();
        $path = $request->file('flash_image')->storeAs('public/flash_image',$fileName);
        $deals['flash_image'] = $path;   
        }

        $deals->save();
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
        $deals = FlashDeals::find($id);
        $deals->flash_title = $request->flash_title;
        $deals->flash_start_date = $request->flash_start_date;
        $deals->flash_end_date = $request->flash_end_date;
        $deals->flash_image = $request->flash_image;
        $deals->save();
        if($files=$request->file('flash_image')){
        $fileName = time().$request->file('flash_image')->getClientOriginalName();
        $path = $request->file('flash_image')->storeAs('public/flash_image',$fileName);
        $deals['flash_image'] = $path;   
        }
        $deals->save();

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

    public function getAddFlashdeals(Request $request){
        return view('admin.flash-deals.add');
    }

    public function getEditFlashDeals(Request $request){
        $id = $request->flash_deals_id;
        $flash = FlashDeals::find($id);
        return view('admin.flash-deals.edit')->with('flash',$flash);
    }
        
}
