<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["favoris"] = Wishlist::where('user_id', Auth::id())->get();
        return view('wishlist.index')->with("viewData", $viewData);
    }


    public function add(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->input('product_id');
    
            // Check if the product exists
            $product = Product::find($product_id);
            if (!$product) {
                return response()->json(['status' => 'Product does not exist']);
            }
    
            // Check if the product is already in the wishlist for the user
            $existingWishlistItem = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if ($existingWishlistItem) {
                return response()->json(['status' => 'Product is already in the wishlist']);
            }
    
            // Add the product to the wishlist
            $wish = new Wishlist();
            $wish->product_id = $product_id;
            $wish->user_id = Auth::id();
            $wish->save();
    
            return response()->json(['status' => 'Product added to the wishlist']);
        } else {
            return response()->json(['status' => 'Login to continue']);
        }
    
        // This line will not be executed if the user is authenticated
        return redirect()->route('wishlist.index');
    }
    


    public function delete_wishlist(Request $request)
    {
     if(Auth::check()){
            $product_id=$request->input('product_id');
            if(Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                $wish=Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => 'itemre removed from wishlist succefully']);
 
            }
                 
        }else{
            return response()->json(['status' => 'login to continue']);

     }
    }

}
