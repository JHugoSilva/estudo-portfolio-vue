<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function get_all_message() {
        $messages = Message::orderBy('id', 'DESC')->get();
        return response()->json([
            'messages' => $messages
        ], 200);
    }

    public function change_status(Request $request, $id) {
        $message = Message::findOrFail($id);
        $message->status = $request->status;
        $message->save();
        return response()->json($request->status, 200);
    }

    public function delete_message($id) {
        $message = Message::findOrFail($id);
        $message->delete();
    }
}
