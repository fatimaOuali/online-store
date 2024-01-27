<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product_images;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['category'] = "";
        $viewData["categories"] = Category::all();
        $viewData["title"] = "Products - Online Store";
        $viewData["products"] = Product::orderBy('created_at', 'DESC')->get();
        return view('product.index')->with("viewData", $viewData);
    }

    public function women()
    {
        $viewData = [];
        $viewData['type'] = "";
        $viewData["types"] = Type::all();
        $viewData["title"] = "Products - Online Store";
        $viewData["products"] = Product::orderBy('created_at', 'DESC')->get();
        return view('product.women')->with("viewData", $viewData);
    }

    public function man()
    {
        $viewData = [];
        $viewData['type'] = "";
        $viewData["types"] = Type::all();
        $viewData["title"] = "Products - Online Store";
        $viewData["products"] = Product::orderBy('created_at', 'DESC')->get();
        return view('product.man')->with("viewData", $viewData);
    }

    public function kids()
    {
        $viewData = [];
        $viewData['type'] = "";
        $viewData["types"] = Type::all();
        $viewData["title"] = "Products - Online Store";
        $viewData["products"] = Product::orderBy('created_at', 'DESC')->get();
        return view('product.kids')->with("viewData", $viewData);
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
    
    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product->getName()." - Online Store";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }
  

    public function showByCategory($categoryId)
    {
        $viewData["products"] = Product::orderBy('created_at', 'DESC')->where('category_id', $categoryId)->get();
        $viewData["categories"] = Category::all();
        $viewData["title"] = "Products - Online Store";
    
        return view('product.index')->with("viewData", $viewData);
    }

    public function showByTypeWomen($typeId)
    {
        $viewData["products"] = Product::orderBy('created_at', 'DESC')->where('type_id', $typeId)->get();
        $viewData["types"] = Type::all();
        $viewData["title"] = "Products - Online Store";
    
        return view('product.women')->with("viewData", $viewData);
    }

    public function showByTypeMen($typeId)
    {
        $viewData["products"] = Product::orderBy('created_at', 'DESC')->where('type_id', $typeId)->get();
        $viewData["types"] = Type::all();
        $viewData["title"] = "Products - Online Store";
    
        return view('product.man')->with("viewData", $viewData);
    }

    public function showByTypeKids($typeId)
    {
        $viewData["products"] = Product::orderBy('created_at', 'DESC')->where('type_id', $typeId)->get();
        $viewData["types"] = Type::all();
        $viewData["title"] = "Products - Online Store";
    
        return view('product.kids')->with("viewData", $viewData);
    }
}
