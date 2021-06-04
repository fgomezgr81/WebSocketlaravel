<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;

class ChatController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function chat_with(User $user_id)
    {
        $user_a=auth()->user();
        $user_b=$user_id;

        $chat_id=$user_a->chats()->wherehas('users',function($q) use ($user_b){
            $q->where('chat_user.user_id',$user_b->id);
        })->first();

        if(!$chat_id){
            $chat_id=Chat::create([]);

            $chat_id->users()->sync([$user_a->id,$user_b->id]);

        }

        return redirect()->route('chat.show',$chat_id);
    }

    public function show(Chat $chat_id){
        abort_unless($chat_id->users->contains(auth()->id()),403);

        return view('chat',[
            'chat'=>$chat_id
        ]);
    }
}
