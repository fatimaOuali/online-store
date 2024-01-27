<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product_images;
use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Products - FINTIC";
        $viewData["products"] = Product::all();
        $viewData["categories"] = Category::all();
        $viewData["types"] = Type::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Product::validate($request);

        $newProduct = new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setSale($request->input('sale'));
       
        $newProduct->setCategoryId($request->input('category'));
        $newProduct->setTypeId($request->input('type'));
        $newProduct->save();

        if ($request->hasFile('image')) {
            $uploadPath= 'storage/';

            $i = 1;
            foreach($request->file('image') as $imageFile ){
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath, $filename); 
                $finalImagePathName = $uploadPath.$filename;
                $newProduct->productImages()->create([
                    'product_id' => $newProduct->id,
                    'image' => $finalImagePathName,
                ]);

            }

        }

           return back();
    }

    public function delete($id)
    {
       
       // Find the parent record you want to delete
$product = Product::find($id);

// Find all the child records that reference the parent record
$items = Item::where('product_id', $id)->get();

// Delete the child records one by one
foreach ($items as $item) {
    $item->delete();
}

// Delete the parent record
$product->delete();
        // Product::destroy($id);
        return back();
}

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Edit Product - FINTIC";
        $viewData["product"] = Product::findOrFail($id);
        $viewData["categories"] = Category::all();
        $viewData["types"] = Type::all();
        return view('admin.product.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Product::validate($request);

        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));
        $product->setSale($request->input('sale'));
        $product->setCategoryId($request->input('category'));

        $product->setTypeId($request->input('type'));

        if ($request->hasFile('image')) {
            $uploadPath= 'storage/';

            $i = 1;
            foreach($request->file('image') as $imageFile ){
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath, $filename); 
                $finalImagePathName = $uploadPath.$filename;
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);

            }

        }
        $product->save();
        return redirect()->route('admin.product.index');
    }

    public function delete_image(int $image_id){
        $productImage = Product_images::findOrFail($image_id) ;
        if (File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage -> delete();
        return back();
    }
}
