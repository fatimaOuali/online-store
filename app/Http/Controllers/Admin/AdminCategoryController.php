<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    //
    public function store(Request $req) {
        Category::validate($req);
        $cat = new Category;
        $cat->setName($req->input('name'));
        $cat->setDescription($req->input('description'));
        $cat->save();
        return back();
    }
    public function edit($id) {
        $viewData = [];
        $viewData['title'] = "Category Edit | FINTIC";
        $viewData['category'] = Category::findOrFail($id);
        return view('admin.category.edit')->with('viewData',$viewData);
    }
    public function update(Request $req,$id) {
        Category::validate($req);
        $cat = Category::findOrFail($id);
        $cat->setName($req->input('name'));
        $cat->setDescription($req->input('description'));
        $cat->save();
        return redirect()->route('admin.category.index');
    }
    public function delete($id)
    {
        Category::destroy($id);
        return back();
    }
    public function index() {
        $viewData = [];
        $viewData["title"] = "Admin Page - Categories - FINTIC";
        $viewData["categories"] = Category::all();
        return view('admin.category.index')->with("viewData", $viewData);
    }
}
