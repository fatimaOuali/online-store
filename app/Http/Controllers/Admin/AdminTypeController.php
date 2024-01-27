<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class AdminTypeController extends Controller
{
    public function store(Request $req) {
        Type::validate($req);
        $typ = new Type;
        $typ->setName($req->input('name'));
        $typ->setDescription($req->input('description'));
        $typ->save();
        return back();
    }
    public function edit($id) {
        $viewData = [];
        $viewData['title'] = "Type Edit | OnlineStore";
        $viewData['type'] = Type::findOrFail($id);
        return view('admin.type.edit')->with('viewData',$viewData);
    }
    public function update(Request $req,$id) {
        Type::validate($req);
        $typ = Type::findOrFail($id);
        $typ->setName($req->input('name'));
        $typ->setDescription($req->input('description'));
        $typ->save();
        return redirect()->route('admin.type.index');
    }
    public function delete($id)
    {
        Type::destroy($id);
        return back();
    }
    public function index() {
        $viewData = [];
        $viewData["title"] = "Admin Page - types - OnlineStore";
        $viewData["types"] = Type::all();
        return view('admin.type.index')->with("viewData", $viewData);
    }
}
