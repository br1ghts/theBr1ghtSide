{{-- resources/views/forum/show.blade.php --}}
<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-8">
        <!-- Thread Details -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">{{ $thread->title }}</h1>
            <p class="text-gray-600 dark:text-gray-400 mb-4">
                Posted by <span class="font-medium">{{ $thread->user->name }}</span> on {{ $thread->created_at->format('M d, Y') }}
            </p>
            <div class="text-gray-800 dark:text-gray-200">
                <p>{{ $thread->body }}</p>
            </div>
        </div>

        <!-- Replies Section -->
        <div class="mt-8 bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Replies</h2>
            @if($thread->replies->isEmpty())
                <p class="text-gray-600 dark:text-gray-400">No replies yet. Be the first to share your thoughts!</p>
            @else
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($thread->replies as $reply)
                        <li class="py-4">
                            <p class="text-gray-800 dark:text-gray-200">{{ $reply->body }}</p>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                By <span class="font-medium">{{ $reply->user->name }}</span> on {{ $reply->created_at->format('M d, Y h:i A') }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Reply Form -->
        <div class="mt-8 bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Add a Reply</h2>
            <form action="{{ route('threads.replies.store', $thread) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="body" class="block text-gray-700 dark:text-gray-300 mb-2">Your Reply</label>
                    <textarea name="body" id="body" rows="4" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-200" required>{{ old('body') }}</textarea>
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded transition">
                    Post Reply
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
