<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request, Thread $thread)
    {
        // Validate the reply content.
        $request->validate([
            'body' => 'required|string',
        ]);

        // Create a new reply associated with the thread and the logged-in user.
        $reply = new Reply();
        $reply->body = $request->body;
        $reply->user_id = auth()->id();
        $reply->thread_id = $thread->id;
        $reply->save();

        // Redirect back to the thread page with a success message.
        return redirect()->route('threads.show', $thread)->with('success', 'Reply posted successfully.');
    }
}
