<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Brand;
use App\MainSlider;
use App\Product;
use DB;
use App\Wishlist;
use Illuminate\Http\Request;
use App\Newsletter;
use Illuminate\Support\Facades\Auth;
use Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Http\Requests;

class FrontendCrontroller extends Controller
{
    //newsletter
    public  function storenewsletter(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email|unique:newsletters'
        ]);
        $newsletter = new Newsletter();
        $newsletter->email=$request->email;
        $newsletter->save();
        $notification=array(
            'messege'=>'Thanks For Subscribe!!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    //home
    public function index(Request $request){
        $CatchId =Str::random(20);
        if (!Session::has('id')){
            $request->session()->put('id',$CatchId);
        }

        $flash_sale=Product::where('status','1')->where('flash_sale','1')->take(10)->get();
        $trend=Product::where('status','1')->where('trend','1')->take(8)->get();
        $topsale=Product::where('status','1')->take(10)->get();
        $brands=Brand::all();
        $topslider=MainSlider::all();
        $newproduct=Product::where('status','1')->orderby('id','desc')->take(16)->get();
        $blog=Blog::where('status','1')->orderby('id','desc')->take(3)->get();

            return view('pages.index')->with(compact('brands','trend','newproduct','topslider','topsale','blog','flash_sale' ));

    }

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
    //show single product
    public function product_details($id){
        $product=Product::where('id',$id)->first();
        $skintype=$product->skin_type_id;
        $skintypeProduct=Product::where('skin_type_id',$skintype)->take(8)->get();
        return view('pages.product-details')->with(compact('product','skintypeProduct'));
    }

    public function showWishlist(){

        $id = Auth::user()->id ;
        $whishlist = DB::table('wishlists')
            ->where('wishlists.user_id',$id)
            ->join('products', 'products.id', '=', 'wishlists.product_id')
            ->select('wishlists.id as whishlistId', 'products.*')
            ->paginate(10);
        //$whishlist = Wishlist::where('user_id',$id)->paginate(10);
        return view('pages.whishlist')->with(compact('whishlist'));
    }

    public function removewishlist($id){
        Wishlist::destroy($id);
        $notification=array(
            'messege'=>'Product Removed Successfully!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }



}
