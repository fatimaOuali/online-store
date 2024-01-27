<?php
namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
public function orders()
{
$viewData = [];
$viewData["title"] = "My Orders - Online Store";
$viewData["subtitle"] = "My Orders";
$viewData["orders"] = Order::with(['items.product'])->where('user_id', Auth::id())->get();
return view('myaccount.orders')->with("viewData", $viewData);
}



public function delete($id)
    {
        Item::destroy($id);
        return redirect()->back()->with('message', 'data deleted successfully.');
    }


}