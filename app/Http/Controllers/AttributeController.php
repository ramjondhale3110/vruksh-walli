<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
use DataTables;

class AttributeController extends Controller
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
        $attributes = new Attribute();
        $attributes->attribute_name = $request->attribute_name;
        $attributes->save();
        return view('admin.attribute.add');
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
      
        $attributes = Attribute::find($id);
        $attributes->attribute_name = $request->attribute_name;
        $attributes->save();
        return view('admin.attribute.all');
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

    public function getAddAttribute(Request $request){
        return view('admin.attribute.add');
    }

    public function getAttributeAllData(Request $request){
        $attributes = Attribute::get();
        return view('admin.attribute.all');
    }

    public function getAllAttributedataTable(Request $request){
        $attributes = Attribute::get();
        return DataTables::of($attributes)->make(true);

    }

    public function getEditAttribute(Request $request){
        $id = $request->attribute_id;
        $attributes = Attribute::find($id);
        return view('admin.attribute.edit')->with('attributes',$attributes);
    }
}
