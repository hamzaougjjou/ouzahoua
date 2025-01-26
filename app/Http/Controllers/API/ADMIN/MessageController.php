<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function messages($conversation_id)
    {
        $messages = Message::where("conversation_id", $conversation_id)->get();
        if (!$messages) {
            return response()->json([
                'success' => false,
                'message' => 'messages not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'messages retrieved successfully',
            'messages' => $messages,
        ]);
    }

    public function sendMessage(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'message' => 'required|string|max:1000',
            'user_id' => 'required|exists:users,id', // Ensure user exists
        ]);

        $userId = Auth::id(); // Get the authenticated user's ID (or admin)
        $isAdmin = Auth::user()->is_admin(); // Assume there's a field to identify admin users

        // Find or create a conversation between the authenticated user and the target user
        $conversation = Conversation::firstOrCreate(
            ['user_id' => $request->user_id], // Assuming this is a one-on-one conversation
            ['last_message' => '', 'seen' => false] // Default values for a new conversation
        );

        // Create the new message
        $message = Message::create([
            'message' => $request->message,
            'user_id' => $userId,
            'conversation_id' => $conversation->id,
            'admin_id' => $isAdmin ? $userId : null, // If admin is sending, use admin_id
        ]);

        // Update the conversation with the new last message and mark as unseen
        $conversation->update([
            'last_message' => $message->message,
            'updated_at' => now(),
            'seen' => false, // Mark as unseen when a new message is sent
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!',
            'message_data' => $message,
            'conversation' => $conversation, // Include conversation data in the response
        ], 200);
    }



}
