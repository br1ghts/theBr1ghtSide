{{-- resources/views/forum/index.blade.php --}}
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
                <div class="px-6 py-4">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Forum Threads</h1>
                        <a href="{{ route('threads.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition">
                            Create Thread
                        </a>
                    </div>
                    @if($threads->isEmpty())
                        <div class="text-center py-10">
                            <p class="text-gray-600 dark:text-gray-400">No threads yet. Be the first to post!</p>
                        </div>
                    @else
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($threads as $thread)
                                <li class="py-4">
                                    <a href="{{ route('threads.show', $thread) }}" class="block hover:bg-gray-50 dark:hover:bg-gray-700 p-4 rounded transition">
                                        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $thread->title }}</h2>
                                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                            Posted by <span class="font-medium">{{ $thread->user->name }}</span> on {{ $thread->created_at->format('M d, Y') }}
                                        </p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
