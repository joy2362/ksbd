<?php

namespace App\Http\Controllers\Admin\sitedetails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SiteDetails;
use Illuminate\Support\Str;
use Image;


class SitedetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function siteinfo(){
        $setting=SiteDetails::where('id','1')->first();
        return view('admin.siteinfo.siteinfo',compact('setting'));
    }
    public function editsiteinfo(Request $request){
        $validatedData = $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);
        $setting=SiteDetails::where('id','1')->first();
        if($request->logo){
            unlink($request->oldlogo);
            $img_1 = $request->logo;
            $img_1_name='public/media/sitelogo/'.Str::random(10).'.'.Str::lower($img_1->getClientOriginalExtension());
            Image::make($img_1)->save($img_1_name);

            $setting->logo= $img_1_name;
        }
        if($request->site_name){
            $setting->site_name= $request->site_name;
        }
        if($request->address){
            $setting->address= $request->address;
        }
        if($request->phone_1){
            $setting->phone_1= $request->phone_1;
        }
        if($request->about){
            $setting->about= $request->about;
        }
        if($request->email){
            $setting->email= $request->email;
        }
        if($request->facebook_link){
            $setting->facebook_link= $request->facebook_link;
        }
        if($request->instagram_link){
            $setting->instagram_link= $request->instagram_link;
        }
        $setting->save();
        $notification=array(
            'messege'=>'Setting changed Successfully!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
