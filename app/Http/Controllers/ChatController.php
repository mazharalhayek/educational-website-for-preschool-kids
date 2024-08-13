<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MessageRequest;

class ChatController extends Controller
{
    /**
     * Send a message to a specific user
     * @param \App\Http\Requests\MessageRequest $request
     * @param mixed $id
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function sendMessage(MessageRequest $request,$id)
    {
        $filterContent = app('profanityFilter')->filter($request->content);
        $validated = $request->validated();

        $sent = Message::create([
            'senderId'=>Auth::id(),
            'receiverId'=>$id,
            'content'=>$request->content,
        ]);

        return redirect()->back();
    }

    public function getChat($id){
        $chat = Auth::user()->allMyMessages($id);
        return view('chat',compact('chat'));
    }
}
