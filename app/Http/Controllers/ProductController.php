<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Seller;
use App\Models\CategoryProduct;
use App\Models\MultipleColor;
use App\Models\Attribute;
use DataTables;

class ProductController extends Controller
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
        $product = new Products();
        $product->product_name = $request->product_name; 
        $product->product_code = $request->product_code;
        $product->unit = $request->unit;
        $product->product_tax = $request->product_tax;
        $product->product_unit_price = $request->product_unit_price;
        $product->product_discount = $request->product_discount;
        $product->discount_type = $request->discount_type;
        $product->product_qty = $request->product_qty;
        $product->product_order_qty = $request->product_order_qty;
        $product->product_shipping_cost = $request->product_shipping_cost;  
        $product->meta_title = $request->meta_title;
        $product->product_description = $request->product_description;
        $product->youtube_link = $request->youtube_link; 
        $product->meta_description = $request->meta_description;  
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        if($request->discount_type=="flat"){
            $discount_price = $request->product_unit_price - $request->product_discount;
            $final_price = $discount_price + $request->product_tax/100;
            $product->final_price = $final_price;
        }else{
            $discount_price = $request->product_unit_price * $request->product_discount/100;
            $final_price = $discount_price + $request->product_tax/100;
            $product->final_price = $final_price;
        }
      
        //$product->product_colour = $request->product_colour;
 /*       $discount_price = $request->product_unit_price * $request->product_discount/100;
        $final_price = $discount_price + $request->product_tax/100;
        $product->final_price = $final_price;*/
       
        
        if ($request->hasFile('product_img')) {
            $image = $request->file('product_img');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/admins/images/product_img'), $image_name);
            $profile = "/admins/images/product_img/" . $image_name;
            $product->product_img = $profile;
        }
       
        if ($request->hasFile('thumbnail_img')) {
            $image = $request->file('thumbnail_img');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/admins/images/thumbnail_img'), $image_name);
            $profile = "/admins/images/thumbnail_img/" . $image_name;
            $product->thumbnail_img = $profile;
        }
        
        if ($request->hasFile('meta_img')) {
            $image = $request->file('meta_img');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/admins/images/meta_img'), $image_name);
            $profile = "/admins/images/meta_img/" . $image_name;
            $product->meta_img = $profile;
        }
        $product->save();

        $color = new MultipleColor();
        $color->color_name = implode(',', $request->color_name);
        $color->product_id = $product->product_id;
        $color->save();

        /*$cat_product = new CategoryProduct();
        $cat_product->category_id = $request->category_id;
        $cat_product->sub_category_id = $request->sub_category_id;
        $cat_product->product_id = $product->product_id;
        $cat_product->save();*/
      
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
        $category = Category::get();
        $brand = Brand::get();
        $product = Products::where('product_id',$id)->with('category')->with('brand')->with('subcategory')->first();

        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_attributs = $request->product_attributs;
        $product->product_unit_price = $request->product_unit_price;
        $product->product_purchase_price = $request->product_purchase_price;
        $product->product_tax = $request->product_tax;
        $product->product_discount = $request->product_discount;
        $product->product_qty = $request->product_qty;
        $product->product_order_qty = $request->product_order_qty;
        $product->product_shipping_cost = $request->product_shipping_cost;   
        $product->thumbnail_img = $request->thumbnail_img;  
        $product->youtube_link = $request->youtube_link;  
        $product->meta_img = $request->meta_img;  
        $product->product_img = $request->product_img; 
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->save();
        if($files=$request->file('product_img')){
            $fileName = time().$request->file('product_img')->getClientOriginalName();
            $path = $request->file('product_img')->storeAs('public/productimg',$fileName);
            $product['product_img'] = $path;   
        }
        $product->save();
        if ($file = $request->file('thumbnail_img')) {
            $fileName = time().$request->file('thumbnail_img')->getClientOriginalName();
            $path = $request->file('thumbnail_img')->storeAs('public/thumbnail_img',$fileName);
            $product['thumbnail_img'] = $path;
        }
        $product->save();
        if ($file = $request->file('meta_img')) {
            $fileName = time().$request->file('meta_img')->getClientOriginalName();
            $path = $request->file('meta_img')->storeAs('public/meta_img',$fileName);
            $product['meta_img'] = $path;
        }
        $product->save();
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

    public function getAddProduct(Request $request){
        $category = Category::get();
        $brand = Brand::get();
        $attribute = Attribute::get();
        return view('admin.product.add')->with('category',$category)->with('brand',$brand)->with('attribute',$attribute);
    }

    public function getEditProduct(Request $request){
       
        $id = $request->product_id;
        $category = Category::get();
        $brand = Brand::get();
        $product = Products::where('product_id',$id)->with('category')->with('brand')->with('subcategory')->first();
     
        return view('admin.product.edit')->with('product',$product)->with('category',$category)->with('brand',$brand);
    }

    public function getAllProductdata(Request $request){
        $product = Products::get();
        return view('admin.product.all');
    }

    public function getdataTable(Request $request){
        $product = Products::get();
        return DataTables::of($product)->make(true);
    }

    public function getdataTableProductStock(Request $request){
        $product = Products::get();
        $seller = Seller::get();
        return view('admin.business_section.product_stock')->with('seller',$seller);
    }

    public function getAllProductStockDdataTable(Request $request){
        $product = Products::get();
        $seller = Seller::get();

        return DataTables::of($product)->make(true);
    }

    public function getProductStockLimit(Request $request){
        $product = Products::max('product_qty');
        return $product;
    }

}
