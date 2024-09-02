<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getUsers (){
        $users = User::get();
        return response()->json($users);
    }
    public function submitMessage (Request $request){
        $message = new Message();
        $message->sender_id = $request->sender_id;
        $message->receiver_id = $request->receiver_id;
        $message->message_content = $request->message_content;
        $message->save();
        return response()->json($message);
    }
    public function displayMessage($senderID, $receiverID) {
        $chat = Message::where(function ($query) use ($senderID, $receiverID) {
            $query->where('sender_id', $senderID)
                ->where('receiver_id', $receiverID);
        })->orWhere(function ($query) use ($senderID, $receiverID) {
            $query->where('sender_id', $receiverID)
                ->where('receiver_id', $senderID);
        })->get();

        return response()->json($chat);
    }
}
