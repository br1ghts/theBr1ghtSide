<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;
use App\Models\Category;
class ThreadController extends Controller
{
    /**
     * Display a listing of the threads.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
    
        $query = Thread::latest()->with('user', 'category');
    
        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
    
        return view('forum.index', [
            'threads' => $query->get(),
            'categories' => $categories, // ✅ Make sure this is passed
        ]);
    }
    

    /**
     * Show the form for creating a new thread.
     */
    public function create()
    {
        return view('forum.create', [
            'categories' => Category::all(), // Fetch all categories
        ]);
    }

    /**
     * Store a newly created thread in storage.
     */
    public function store(Request $request)
    {
        // Validate the input.
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|int|max:255',
            'body'  => 'required|string',
        ]);

        // Create the thread and associate it with the logged-in user.
        $thread = new Thread();
        $thread->title = $request->title;
        $thread->body  = $request->body;
        $thread->category_id  = $request->category_id;
        $thread->user_id = auth()->id();
        $thread->save();

        // Redirect to the threads index with a success message.
        return redirect()->route('threads.index')->with('success', 'Thread created successfully.');
    }

    /**
     * Display the specified thread along with its replies.
     */
    public function show(Thread $thread)
    {
        // Load related replies and the users who posted them.
        $thread->load('replies.user');

        return view('forum.show', compact('thread'));
    }
}
