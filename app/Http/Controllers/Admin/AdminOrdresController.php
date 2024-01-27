<?php

namespace App\Http\Controllers\Admin;

// use App\Models\Commande;
use App\Models\Item;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class AdminOrdresController extends Controller
{
   
    public function orders(){
        $viewData = [];
        $todayDate=Carbon::now();
        $viewData["title"] = "My Commande - FINTIC";
        $viewData["items"] = Item::whereDate('created_at', $todayDate)->paginate(10);
        $viewData["orders"] = Order::all();
        
        // dd($viewData["orders"]);
        return view('admin.orders.orders')->with("viewData", $viewData);
      }

    public function destroy($id)
    {
        Item::destroy($id);
        return redirect()->back()->with('message', 'data deleted successfully.');
    }
    // public function destroy($id)
    // {
    //     Order::destroy($id);
    //     return back();
    // }
//     public function destroy(Request $request)
// {
// $request->session()->forget('orders');
// return back();
// }
}
