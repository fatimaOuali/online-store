<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMessageController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["message"] = Message::all();
        $viewData["title"] = "message - FINTIC";
        return view('admin.message.index')->with("viewData", $viewData);
    }
    public function show($id)
    {
        //
        $viewData["message"] = Message::where('id', $id)->first();
        return view("admin.message.show")->with("viewData", $viewData);
      
      
    }

    public function sendEmail(Request $request)
     {
         $request->validate([
           'email' => 'required|email',
           'subject' => 'required',
           'name' => 'required',
           'content' => 'required',
         ]);
 
         $data = [
           'name' => $request->name,
           'email' => $request->email,
           'message' => $request->message
         ];
 
         Mail::send('admin.message.email-template', $data, function($message) use ($data) {
           $message->to($data['email']);
         });
         return back()->with('message', 'Message Envoyé avec succes.');
         
     
     }

    public function delete($id)
    {
        Message::destroy($id);
        return redirect()->back()->with('message', 'data deleted successfully.');
    }

   
}
?>