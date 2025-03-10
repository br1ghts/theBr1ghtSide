{{-- resources/views/forum/show.blade.php --}}
<x-app-layout>

<div class="container mx-auto p-4">
    <div class="mb-6">
        <h1 class="text-3xl font-bold">{{ $thread->title }}</h1>
        <p class="text-gray-600">Posted by {{ $thread->user->name }} on {{ $thread->created_at->format('M d, Y') }}</p>
        <div class="mt-4">
            <p>{{ $thread->body }}</p>
        </div>
    </div>

    <div class="mb-6">
        <h2 class="text-2xl font-bold mb-4">Replies</h2>
        @if($thread->replies->isEmpty())
            <p>No replies yet. Be the first to share your thoughts!</p>
        @else
            <ul>
                @foreach($thread->replies as $reply)
                    <li class="border p-4 my-2 rounded">
                        <p>{{ $reply->body }}</p>
                        <p class="text-gray-500 text-sm">By {{ $reply->user->name }} on {{ $reply->created_at->format('M d, Y h:i A') }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    {{-- Reply form --}}
    <div class="mt-6">
        <h2 class="text-2xl font-bold mb-2">Add a Reply</h2>
        <form action="{{ route('threads.replies.store', $thread) }}" method="POST" class="bg-white shadow-md rounded p-6">
            @csrf
            <div class="mb-4">
                <label for="body" class="block text-gray-700">Your Reply</label>
                <textarea name="body" id="body" rows="3" class="mt-1 block w-full border border-gray-300 rounded p-2" required>{{ old('body') }}</textarea>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Post Reply</button>
        </form>
    </div>
</div>
</x-app-layout>
