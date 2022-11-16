<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
class PageController extends Controller
{
    public function welcome(){
        if(Auth::check()){
            return "You are login user";
        }
        return "You are not login";
    }
    public function upload(Request $request){
        $file=$request->file('photo');
        $newName=uniqid()."_".$file->getClientOriginalName();
        // $file->storeAs('public/photo',$newName);
        $img=Image::make($file);
        $watermark=Image::make(public_path('logo.png'));
        $watermark->fit(100,100);
        $img->insert($watermark,'bottom-right',20,20);
        $img->save('edited/'.$newName);
        return redirect()->route('home-welcome');
    }
}