<?php

namespace App\Http\Controllers\Admin\order;

use App\Http\Controllers\Controller;
use App\Order;
use App\orderDetails;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $orders = Order::all();
        return view('admin.order.allOrder',compact('orders'));
    }
    public function show($id){
        $order = Order::where('id',$id)->first();
        $product = orderDetails::where('trans_id',$order->transaction_id)->get();
        return view('admin.order.viewOrder')->with(compact('order','product'));
    }

    public function PaymentAccept($id)
    {
        Order::where('id',$id)->update(['status'=>'accept']);
        $notification=array(
            'messege'=>'Order Accept Done',
            'alert-type'=>'success'
        );
        return Redirect()->route('all-order')->with($notification);
    }

    public function PaymentCancel($id)
    {
        Order::where('id',$id)->update(['status'=>'canceled']);
        $notification=array(
            'messege'=>'Order Cancel',
            'alert-type'=>'success'
        );
        return Redirect()->route('all-order')->with($notification);
    }

    public function DeleveryProgress($id)
    {
        Order::where('id',$id)->update(['status'=>'deleveryprogress']);
        $notification=array(
            'messege'=>'Send To delevery',
            'alert-type'=>'success'
        );
        return Redirect()->route('all-order')->with($notification);
    }

    public function DeleveryDone($id)
    {
        Order::where('id',$id)->update(['status'=>'done']);
        $notification=array(
            'messege'=>'Send To delevery',
            'alert-type'=>'success'
        );
        return Redirect()->route('all-order')->with($notification);
    }

}
