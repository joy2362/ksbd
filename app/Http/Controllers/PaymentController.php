<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    protected function AuthCheker(){
       if ( Auth::check()){
           return true;
       }else{
           return false;
       }
    }
    public function payment(Request $request){
        if ($this->AuthCheker()){
            dd($request);
        }else{
            $notification=array(
                'messege'=>'At first login to your account!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }

    }
}
