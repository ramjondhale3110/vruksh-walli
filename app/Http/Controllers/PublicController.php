<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Products;
use App\Models\SubCategory;
use App\Models\WishList;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Auth;
use Session;

class PublicController extends Controller
{
    public function getLoginUserId(Request $request){
        if(Auth::user()){
            $id_token = Auth::user()->id;
        }else{
            $id_token = Session::token();
        }
        return $id_token;
    }
    public function getdashboard(Request $request){
        return view('admin.dashboard');
    }

    public function getCart(Request $request){
        $new_id = $request->new_id;    
        $product_count = Cart::get();
        $cart = Cart::where('new_id',$new_id)->with('cart_product')->get();
        return view('cart')->with('cart',$cart);
    }
    public function getIndex(Request $request){
        $category = Category::where('is_active',1)->get();
        $brand = Brand::where('is_active',1)->get();
        $product = Products::where('is_active',1)->orderBy('product_id','desc')->take(10)->get();
        //return $product;
        return view('index')->with('category',$category)->with('brand',$brand)->with('product',$product);
    }

    public function getProductCategory(Request $request){
        $id = $request->sub_category_id;
        $product = Products::where('sub_category_id',$id)->with('subcategory')->with('category')->get();

        return view('category')->with('product',$product);
    }

    public function getProductDetails(Request $request,$id){
        $prod = Products::where('product_id',$id)->first();
        $user = Auth::user();
        return view('product_details')->with('prod',$prod)->with('user',$user);
    }

    public function postAddCart(Request $request){
        $product_id = $request->product_id;
        if(!Auth::user())
        {
            $id_token = Session::token();  
            Session::put('token',$id_token);

        }else{           
            $id_token = Auth::user()->id;
        }
        //return $id_token;
            //$discount_price = $request->product_unit_price - $request->product_discount;
            $prod = Products::where('product_id',$product_id)->first();
            $cart = new Cart();
            $cart->product_id = $product_id;
            $cart->quantity =  $request->quantity;
            $cart->price = $prod->final_price * $cart->quantity;
            //$cart->quantity =  $request->quantity + $request->quantity;
            $cart->new_id=$id_token;           
            $cart->save();
            return response()->json(['cart' => $cart]);         
    }

    public function postAddToWishList(Request $request){
        $product_id = $request->product_id;
        if(!Auth::user())
        {
             return 'login';
        }else{    
            //$product = Products::where('product_id',$product_id)->first();   
            $cart = new WishList();
            $cart->product_id = $product_id;
            $cart->user_id=Auth::user()->id;

            $cart->save();
            return response()->json(['cart' => $cart]); 
        }
    }

    public function postDeleteCart(Request $request){
        $cart_id = $request->cart_id;
        $cart = Cart::where('cart_id',$cart_id)->delete();
        return response()->json('massage delete successfully !!!'); 
    }

    public function getWishList(Request $request){
        $user_id = $request->user_id;
        $wishlist = WishList::where('user_id',$user_id)->with('product')->get();
        return view('wish_list')->with('wishlist',$wishlist);
    }

    public function postDeleteWishList(Request $request){
        $wish_list_id = $request->wish_list_id;

        $wishlist = WishList::where('wish_list_id',$wish_list_id)->delete();
        return response()->json('massage delete successfully !!!'); 
    }

    public function getCheckOut(Request $request){
        if (!Auth::user()) {
            return view('auth.login');
        }else{
            //$user = Auth::user();
            $data = User::where('id',Auth::user()->id)->where('role',2)->first();
            
        }
        return view('checkout')->with('data',$data);
    }
    
    public function getUpdateCheckOut(Request $request){       
        $user = User::where('id',$request->user_id)->first();
        return response()->json($user); 
    }

    public function checkoutDetails(Request $request){
         $user = User::where('id',$request->user_id)->first();
         $user->name = $request->user_name;
         $user->email = $request->user_email;
         $user->address = $request->address;
         $user->city = $request->city;
         $user->state = $request->state;
         $user->zip_code = $request->zip_code;
         $user->save();
         return redirect()->back();
    }

    public function getPlaceOrder(Request $request){
        return view('place_order');
    }

    public function getBankDetails(Request $request){
        return view('bank_details');
    }

    public function getCheckoutPayment(Request $request){
        $new_id = $request->new_id;
        $cart = Cart::where('new_id',$new_id)->with('cart_product')->get();
        return view('checkout_payment', compact('cart'));
    }

 
     public function getCheckoutComplete(Request $request){
        $new_id = $request->new_id;
        $carts = Cart::where('new_id',$new_id)->with('cart_product')->get();
           /* return 'login';*/
       /* $order = new Order();
        foreach($carts as $cart){
            $order->product_id = $cart->product_id;
            $order->user_id = $cart->new_id;
            $order->payment_method  = "cash";  
            $order->amount  = $cart->price;   
            $order->save();
        }*/
        return response()->json($carts);
    }

    public function getPaymentDetails(Request $request){
        $param = $request->cashondelivery;
        $pays = Cart::where('new_id',$param)->with('cart_product')->get();
        $order = new Order();
        foreach($pays as $pay){
            $order->product_id = $pay->product_id;
            $order->user_id = $pay->new_id;
            $order->payment_method  = "cash";  
            $order->amount  = $pay->price;   
            $order->save();
        }
        return view('payment_details')->with('pays',$pays);
    }
}
