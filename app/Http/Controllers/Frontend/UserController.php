<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
   public function index(){
    $viewData = [];
    $profile = User::findOrFail(Auth::user()->id);
    $viewData["title"] = $profile->name." ";
    $viewData["profile"] = $profile;
    return view('profile.index')->with("viewData", $viewData);

   }



public function show()
{
    $viewData = [];
    $profile = User::findOrFail(Auth::user()->id);
    $viewData["title"] = $profile->name." ";
    $viewData["profile"] = $profile;
    return view('profile.show')->with("viewData", $viewData);
}


   // updateProfile

   public function updateProfile(Request $request)
   {

    $request->validate([
      'username' => ['required', 'string'],
      'phone' => ['required'],
      // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      // , 'digits:10'
      'address' => ['required', 'string', 'max:499'],
    ]);
    
    // if (Auth::user()->image == null) {
    //  $validate_image =  Validator::make($request->all(),[
    //     'image' => ['required','image', 'max:1000'],
    //   ]);
    //   if($validate_image->fails()){
    //     return response()->json(['code' => 400, 'message' => $validate_image->errors()->first()]);
    //   }
       
    // }

    if($request->hasFile('image')){
      $imagepath = 'storage/'.auth()->user()->image;
      if (File::exists($imagepath)){
        File::delete($imagepath);
    }

    $progile_image = $request->image->store('image','public');

  }
      $user = User::findOrFail(Auth::user()->id);
      $user->update([
        'name' => $request->username,
        'phone'=> $request->phone,
        // 'email' => $request->email,
        'address'=> $request->address,
        'image'=> $progile_image ?? auth()->user()->image,
      ]);

      return redirect()->back()->with('message', 'user profile updated');
      
     }

     
}
