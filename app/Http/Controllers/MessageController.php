<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function sent(Request $request){

       
        // $message=auth()->user()->messages()->create([
        //     'content'=>$request->message,
        //     'chat_id'=>$request->chat_id
        // ])->load('user');
        $mesage=auth()->user()->messages()->create($request->all())->load('user')

        return $message;
    }
}
