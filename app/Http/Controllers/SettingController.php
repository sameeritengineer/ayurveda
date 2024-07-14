<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function create(){
       $setting = Setting::where('id',1)->first(); 
       if($setting){
        $type = 2; 
       }else{
        $type = 1; 
       }
       return view('admin.setting.create',compact('type','setting'));
    }

    public function save(Request $request){
      // dd($request->all());
    if(isset($request->setting_id)){
       $setting = Setting::where('id',1)->first();
    }else{
       $setting = new Setting(); 
    }
    $socialMedia = [
        "facebook" => $request->facebook,
        "instagram" => $request->instagram,
        "twitter" => $request->twitter,
        "linkedin" => $request->linkedin,
    ];
    // Convert the associative array to a JSON object
    $jsonObject = json_encode($socialMedia, JSON_PRETTY_PRINT);
    
    $setting->title = $request->title;
    $setting->description = $request->description;
    $setting->background_color = $request->background_color;
    $setting->phone = $request->phone;
    $setting->email = $request->email;
    $setting->address = $request->address;
    $setting->footer_description = $request->footer_description;
    $setting->right_reserve = $request->right_reserve;
    $setting->social = $jsonObject;
    if($request->hasFile('slider_image')){
         $setting->slider_image =  upload_image('images/settings/',$request->slider_image);
    }
    if($request->hasFile('fav_icon')){
         $setting->fav_icon =  upload_image('images/settings/',$request->fav_icon);
    }
    if($request->hasFile('logo')){
         $setting->logo =  upload_image('images/settings/',$request->logo);
    }

    if($setting->save()){
        return redirect()->route('create-setting')->with('success', 'Setting Updated Successfully.');
    } else {
        return redirect()->route('create-setting')->with('alert', 'Failed to update Setting. Please try again.');
    }


    }
}
