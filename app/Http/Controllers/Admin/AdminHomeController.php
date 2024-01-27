<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class AdminHomeController extends Controller
{
public function index()
{
$viewData = [];
// $viewData["user"] = User::all();
$viewData["TotalProducts"]= Product::count();
$viewData["TotalCategories"]= Category::count();
$viewData["TotalMessage"]= Message::count();


$viewData["TotalAllUsers"]= User::count();
$viewData["TotalUsers"]= User::where('role','client')->count();
$viewData["TotalAdmin"]= User::where('role','admin')->count();

$viewData["TodayDate"]= Carbon::now()->format('d-m-Y');
$viewData["thisMonth"]= Carbon::now()->format('m');
$viewData["thisYear"]= Carbon::now()->format('Y');


$viewData["TotalOrders"]= Order::count();
$viewData["TodayOrders"]= Order::whereDate('created_at',$viewData["TodayDate"])->count();
$viewData["thisMonthOrders"]= Order::whereMonth('created_at',$viewData["thisMonth"])->count();
$viewData["thisYearOrders"]= Order::whereYear('created_at',$viewData["thisYear"])->count();

$viewData["title"] = "Admin Page - FINTIC";
return view('admin.home.index')->with("viewData", $viewData);
}
}
