<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Tutor;
use App\Models\Message;
use App\Models\Children;
use App\Models\Services;
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
    public function sendMessage(MessageRequest $request, $id)
    {
        $filterContent = app('profanityFilter')->filter($request->content);
        $validated = $request->validated();
        $sent = Message::create([
            'senderId' => Auth::id(),
            'receiverId' => $id,
            'childId' => Children::inRandomOrder()->first()->id,
            'content' => $request->content,
        ]);

        return redirect()->back();
    }

    /**
     * Delete a specific message from chat
     * @param \App\Models\Message $message
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function del_message($id)
    {
        $message = Message::where('id', $id)->first();
        $message->delete();
        return redirect()->back();
    }

    /** 
     * Edit the content of a specific del_message
     * @param  \App\Http\Requests\MessageRequest $message
     * @param mixed $id
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function edi_message(MessageRequest $message, $id)
    {
        $nmessage = Message::where('id', $id)->first();
        $nmessage->content = $message->content;
        $nmessage->save();
        return redirect()->back();
    }

    /**
     * Report a specific recieved message
     * @param mixed $id
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function reportMessage($id)
    {
        $message = Message::where('id', $id)->first();
        $message->update(['isReported' => true]);               
        return redirect()->back();
    }

    /**
     * Clear all chat messages
     * @param mixed $id
     * @return void
     */
    public function ClearChat($id)
    {        
        foreach(Auth::user()->allMyMessages($id) as $message){
            Message::where('id',$message['id'])->delete();
        }
        return redirect()->back();
    }

    /**
     * Remove a specific message from reported messages
     * @param mixed $id
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function unreport($id)
    {
        $message = Message::where('id',$id)->first();
        $message->isReported = false;
        $message->save();
        return redirect()->back();
    }
}
