<?php

namespace App\Http\Controllers;


use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit(){
        return view("profile.edit");
    }

    public function  update(Request $request){
        $request->validate([
            "photo"=>"required|mimetypes:image/jpeg,image/png,image/jpg",
        ]);
        $file = $request->file("photo");
        $newFileName  = uniqid(). "_profile." . $file->getClientOriginalName();
        $dir = "/public/profile";
       // $file->move("store/",$newFileName);
        $file->storeAs($dir,$newFileName);
        //Storage::putFileAs($dir,$file,$newFileName);

        $user = User::find(Auth::id());
        $user->photo = $newFileName;
        $user->update();

        return redirect()->route("profile.edit");
    }

    public function changePassword(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
//        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);        return $request;
        $user = new User();
        $currentUser = $user->find(Auth::id());
        $currentUser->password = Hash::make($request->new_password);
        $currentUser->update();

        Auth::logout();
        return redirect()->route('login');
    }
}
