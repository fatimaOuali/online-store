<?php

namespace App\Http\Controllers\Admin;

use App\Models\Commande;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCommandeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["commande"] = Commande::all();
        $viewData["title"] = "commande - FINTIC";
        return view('admin.commande.index')->with("viewData", $viewData);
    }

    public function delete($id)
    {
        Commande::destroy($id);
        return redirect()->back()->with('message', 'data deleted successfully.');
    }
}
