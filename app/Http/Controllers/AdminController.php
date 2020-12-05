<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use DB;
class AdminController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today=Order::whereDate('order_at', now())->sum('amount');
        $month=Order::whereMonth('order_at', now())->sum('amount');
        $year=Order::whereYear('order_at','=',now())->sum('amount');
        $delevery=Order::whereDate('order_at', now())->where('status','done')->sum('amount');
        $product=Product::count();
        $brand=Brand::count();
        $user=User::count();
        $return=Order::where('return_order',2)->sum('amount');
        return view('admin.home')->with(compact('product','brand','user','today','month','year','delevery','return'));
    }

    public function ChangePassword()
    {
        return view('admin.auth.passwordchange');
    }

    public function Update_pass(Request $request)
    {
      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      $user=Admin::find(Auth::id());
                      $user->password=Hash::make($request->password);
                      $user->save();
                      Auth::logout();
                      $notification=array(
                        'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('admin.login')->with($notification);
                 }else{
                     $notification=array(
                        'messege'=>'New password and Confirm Password not matched!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                 }
      }else{
        $notification=array(
                'messege'=>'Old Password not matched!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
      }
    }

    public function logout()
    {
        Auth::logout();
            $notification=array(
                'messege'=>'Successfully Logout',
                'alert-type'=>'success'
                 );
             return Redirect()->route('admin.login')->with($notification);
    }

}
