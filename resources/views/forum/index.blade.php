{{-- resources/views/forum/index.blade.php --}}
<x-app-layout>


<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                @if($threads->isEmpty())
                    <p>No threads yet. Be the first to post!</p>
                @else
                    <ul>
                        @foreach($threads as $thread)
                            <li class="border p-4 my-2 rounded hover:bg-gray-50">
                                <a href="{{ route('threads.show', $thread) }}" class="text-xl font-semibold">
                                    {{ $thread->title }}
                                </a>
                                <p class="text-gray-600">Posted by {{ $thread->user->name }} on {{ $thread->created_at->format('M d, Y') }}</p>
                            </li>
                        @endforeach
                    </ul>
                @endif
                </div>
            </div>
        </div>
    </div>




</x-app-layout>
