<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Http\Controllers\Controller;
use App\Models\Conversation;

class ConversationController extends Controller
{
    public function conversations()
    {
        $conversations = Conversation::orderBy('updated_at' , 'desc')->get();




        if (!$conversations) {
            return response()->json([
                'success' => false,
                'message' => 'conversation not found',
            ], 404);
        }

        foreach ($conversations as $conversation) {
            # code...
            // $conversation->user;
            $conversation->user;
        }

        return response()->json([
            'success' => true,
            'message' => 'conversation retrieved successfully',
            'conversations' => $conversations,
        ]);

    }
    public function show($id)
    {
        $conversation = Conversation::find($id);
        if (!$conversation) {
            return response()->json([
                'success' => false,
                'message' => 'conversation not found',
            ], 404);
        }

        $conversation->user;
        return response()->json([
            'success' => true,
            'message' => 'conversation retrieved successfully',
            'conversation' => $conversation,
        ]);

    }

}
