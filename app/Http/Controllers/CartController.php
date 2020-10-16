<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use DB;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;
use Cart;

class CartController extends Controller
{
    //add wishlist
    public  function addwishlist($id){
        if (Auth::check()){
            $user=Auth::user()->id;
            $check=Wishlist::where('user_id',$user)->where('product_id',$id)->first();
            if ($check){
                return response()->json(['error'=>'Already added to the wishlist']);
            }else{
                $wishlist=new Wishlist();
                $wishlist->user_id=$user;
                $wishlist->product_id=$id;
                $wishlist->save();
                return response()->json(['success'=>'product added successfully']);
            }
        }else{
            return response()->json(['error'=>'Login first!!']);
        }
    }
    public function addcart($id){
        $item = Cart::search(function ($cart, $key) use($id) {
            return $cart->id == $id;
        })->first();

        if(!$item){
            $product = Product::where('id',$id)->first();
            $data= array();
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=1;
            if ($product->discount_price){
                $data['price']= $product->discount_price;

            }else{
                $data['price']= $product->selling_price;
            }
            $data['weight']=1;
            $data['options']['image']=$product->image_one;

            Cart::add($data);
        }else{
            return response()->json(['error' => 'Already in your Cart']);
        }
        return response()->json(['success' => 'Successfully Added on your Cart']);
    }

    public function insertcart(Request $request){
        $id = $request->id;
        $item = Cart::search(function ($cart, $key) use($id) {
            return $cart->id == $id;
        })->first();

        if(!$item){
            $product = Product::where('id',$id)->first();
            $data= array();
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty ;
            if ($product->discount_price){
                $data['price']= $product->discount_price;

            }else{
                $data['price']= $product->selling_price;
            }
            $data['weight']=1;
            $data['options']['image']=$product->image_one;

            Cart::add($data);
        }else{
            $notification=array(
                'messege'=>'Already in your Cart',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
        $notification=array(
            'messege'=>'Successfully Added on your Cart',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
