<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $conversations = $user->conversations;

        return view('conversations.index', compact('user', 'conversations'));
    }

    public function form(?Conversation $conversation = null)
    {
        $users = User::query()->pluck('name', 'id');

        return view('conversations.form', compact('conversation', 'users'));
    }

    public function save(Request $request, ?Conversation $conversation = null)
    {
        $request->validate([
            'recipient_id' => 'required|exists:users,id',
            'text' => 'required|string|max:255',
        ]);

        $conversation ??= $this->createConversation($request);

        // create message
        $message = Message::create([
            'conversation_id' => $conversation->id,
            'type' => 'text', // hardcoded for now
            'text' => $request->input('text'),
        ]);

        return redirect()->route('conversations.form', $conversation);
    }

    private function createConversation(Request $request): Conversation
    {
        return Conversation::create([
            'user_id' => auth()->user()->id,
            'recipient_id' => $request->input('recipient_id'),
        ]);
    }
}
