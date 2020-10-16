<?php

namespace App\Http\Controllers\Admin\coupon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    //view coupons
    public function coupons(){
        $coupon=Coupon::all();
        return view('admin.coupon.coupon',compact('coupon'));
    }

    //save new coupon
    public  function  storecoupon(Request $request){
        $validatedData = $request->validate([
            'code' => 'required|unique:coupons|max:10|min:3',
            'discount' => 'required |integer | between:1,95',
            'status' => 'required',
        ]);
        //Eloquent orm
        $coupon=new Coupon();
        $coupon->code=$request->code;
        $coupon->discount=$request->discount;
        $coupon->status=$request->status;
        $coupon->save();
        $notification=array(
            'messege'=>'Coupon Saved Successfully!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    //edit coupon
    public function editcoupon($id){
        $coupon = Coupon::where('id', $id)->firstOrFail();
        return view('admin.coupon.edit_coupon',compact('coupon'));
    }

    //update coupon
    public  function updatecoupon(Request $request){
        $validatedData = $request->validate([
            'code' => 'required|max:10|min:3',
            'discount' => 'required |integer | between:1,95',
            'status' => 'required',
        ]);
        $coupon = new Coupon();
        $update=$coupon::where('id', $request->id)->update(['code' => $request->code ,'discount'=>$request->discount , 'status'=>$request->status]);

        if ($update){
            $notification=array(
                'messege'=>'Coupon Updated Successfully!',
                'alert-type'=>'success'
            );
            return Redirect()->route('coupons')->with($notification);
        }else{
            $notification=array(
                'messege'=>'Somthing Wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    //delete a coupon
    public function deletecoupon($id){
        Coupon::where('id',$id)->delete();
        $notification=array(
            'messege'=>'Coupon Deleted Successfully!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
