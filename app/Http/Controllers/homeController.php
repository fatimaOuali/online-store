<?php
namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Home Page - Online Store";
       
        return view('home.index')->with("viewData", $viewData);
        

    }
    public function about()
    {
        $viewData = [];
        $viewData["title"] = "Home Page - Online Store";
        $viewData["categories"] = Category::all();
        $viewData["products"] = Product::orderBy('created_at', 'DESC')->get();
       

        return view('home.about')->with("viewData", $viewData);

    }

    public function search(Request $request){
        $viewData["title"] = "Products - Online Store";
        $viewData["categories"] = Category::all();
        if($request->search){
 $viewData["searchProducts"] = Product::where('name','LIKE','%'.$request->search.'%')->latest()->paginate(15);
       return view('search.search')->with("viewData", $viewData);
}else{
         return redirect()->back()->with('message', 'Empty search');
        }
    }
    

    public function propos()
    {
        $viewData = [];
        $viewData["title"] = "About";
      
        return view('propos.index')->with("viewData", $viewData);
    }

    public function showByCategory($categoryId)
    {
        $viewData["products"] = Product::orderBy('created_at', 'DESC')->where('category_id', $categoryId)->get();
        $viewData["categories"] = Category::all();
        $viewData["title"] = "Products - OnlineStore";
    
        return view('home.about')->with("viewData", $viewData);
    }


    
}
