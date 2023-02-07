<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function getAddProduct(Request $request){

        return view('admin.product.add');
    }

    public function postAddProduct(Request $request){

        $product = new Products();
        $product['product_name'] = $request->product_name;
        return $product;
        $product->product_code = $request->product_code;
        $product->product_attributs = $request->product_attributs;
        $product->product_unit_price = $request->product_unit_price;
        $product->product_purchase_price = $request->product_purchase_price;
        $product->product_tax = $request->product_tax;
        $product->product_discount = $request->product_discount;
        $product->product_qty = $request->product_qty;
        $product->product_order_qty = $request->product_order_qty;
        $product->product_shipping_cost = $request->product_shipping_cost;
        
        $product->save();

        return redirect()->back();
    }
}
