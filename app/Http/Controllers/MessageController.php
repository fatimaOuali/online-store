<?php

namespace App\Http\Controllers;


use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class MessageController extends Controller
{
    

    

     public function index()
     {
         $viewData = [];
         $viewData["message"] = Message::all();
         $viewData["title"] = "message - Online Store";
         return view('message.index')->with("viewData", $viewData);
     }

     
    

   
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required'],
        ]);
    }

   
    protected function create(array $data)
    {
        return Message::create([
            'email' => $data['email'],
            'message' => $data['message'],
        ]);
    }
    public function store(Request $request)
    {
         $viewData["message"]  = new Message([
            'email' => $request->get('email'),
            'message' => $request->get('message'),
        ]);

         $viewData["message"] ->save();

         return back()->with('success', 'Message sent with successes.');
        
    }
}
?>