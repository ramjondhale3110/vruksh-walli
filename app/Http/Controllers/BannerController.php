<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Banner;
use DataTables;

class BannerController extends Controller
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
        $banner = new Banner();
        $banner->banner_url = $request->banner_url;
        $banner->banner_type = $request->banner_type;
        $banner->resource_type = $request->resource_type;
        $banner->banner_image = $request->banner_image;
        $banner->save();
        if ($file = $request->file('banner_image')) {
            $fileName = time().$request->file('banner_image')->getClientOriginalName();
            $path = $request->file('banner_image')->storeAs('public/banner_image',$fileName);
            $banner['banner_image'] = $path;
        }
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
    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        $banner->banner_url = $request->banner_url;
        $banner->banner_type = $request->banner_type;
        $banner->resource_type = $request->resource_type;
        $banner->banner_image = $request->banner_image;
        $banner->save();
        if ($file = $request->file('banner_image')) {
            $fileName = time().$request->file('banner_image')->getClientOriginalName();
            $path = $request->file('banner_image')->storeAs('public/banner_image',$fileName);
            $banner['banner_image'] = $path;
        }
        $banner->save();
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

    public function getAddBanner(Request $request){
        return view('admin.banner.add');
    }

    public function getAllBanner(Request $request){
        $banner = Banner::get();
        return view('admin.banner.all');
    }

    public function getAllBannerData(Request $request){
        $banner = Banner::get();
        return DataTables::of($banner)->make(true);
    }

    public function getEditBanner(Request $request){
        $id = $request->banner_id;
        $banner = Banner::find($id);
        return view('admin.banner.edit')->with('banner',$banner);
    }
}
