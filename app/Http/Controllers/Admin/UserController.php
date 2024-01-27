<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["users"] = User::all();
        $viewData["title"] = "clients - FINTIC";
        return view('admin.clients.index')->with("viewData", $viewData);
    }
    public function delete($id)
    {
        User::destroy($id);
        return back();
    }

   
}
?>