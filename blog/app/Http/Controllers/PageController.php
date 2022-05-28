<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PageController extends Controller
{
    public function welcome(){
        if(Auth::check())
        {
            return "You are login user";
        }
        return "you are not login";
    }

    public function upload(Request $request)
    {
        $file = $request->file('photo');
        $newName = uniqid() . "_" .$file->getClientOriginalName();
       // $file->storeAs("public/photo",$newName);
        $img = Image::make($file);

       /* $img->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });*/
        $watermark = Image::make(public_path('logo.png'));
        $watermark->fit(200,200);
        $img->insert($watermark,"bottom-right",20,20);
        $img->save("edited/".$newName);

        $img->fit(100,100);
        $img->save("small/".$newName);
        return $img->response();
        $img->crop(1000,500,0,0);
        //$img->fit(100,100);
        return $img->response();
        return redirect()->route('varcode');
    }
}
