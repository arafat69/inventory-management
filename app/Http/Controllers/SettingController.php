<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('setting.edit',compact('setting'));
    }

    public function update(Request $request,$id)
    {
        $setting = Setting::find($id);
        if ($request->company_logo != '') {
            $path = public_path('uploads/company/');
            unlink($path.$setting->company_logo);
            $extension = $request->company_logo->getClientOriginalExtension();
            $file_name = date('d_m_Y_').time().'.'.$extension;
            $request->company_logo->move($path,$file_name);
            $setting->company_logo = $file_name;
        }
        $setting->company_name    =  $request->company_name;
        $setting->company_address =  $request->company_address;
        $setting->company_email   =  $request->company_email;
        $setting->company_phone   =  $request->company_phone;
        $setting->company_mobile  =  $request->company_mobile;
        $setting->company_city    =  $request->company_city;
        $setting->company_country =  $request->company_country;
        $setting->company_zipcode =  $request->company_zipcode;
        $setting->save();
        session()->flash('message', 'Setting Updated Successfull');
        return redirect()->back();
    }
}
