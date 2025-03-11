<x-app-layout>
    <div class="py-3">
        <div class="max-w-[95%] mx-auto">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
                <div class="px-6 py-4">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Forum Threads</h1>

                        <!-- Category Filter Dropdown -->
                        <form method="GET" action="{{ route('threads.index') }}" class="relative">
                            <select name="category" onchange="this.form.submit()" class="bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 px-4 py-2 rounded-md shadow-md">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>

                        <!-- Sticky Create Thread Button -->
                        <a href="{{ route('threads.create') }}" 
   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition 
          md:fixed bottom-4 right-4 md:relative md:bottom-0 md:right-0">
    + Create Thread
</a>
                    </div>

                    @if($threads->isEmpty())
                        <div class="flex flex-col items-center py-10">
                            <svg class="w-16 h-16 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 14l6-6m0 0l-6-6m6 6H3"></path>
                            </svg>
                            <p class="text-gray-600 dark:text-gray-400 mt-4">No threads yet. Be the first to post!</p>
                        </div>
                    @else
                        <!-- Loading Indicator -->
                        <div id="loading" class="text-center py-4 text-gray-600 dark:text-gray-400 hidden">
                            Loading threads...
                        </div>

                        <ul class="divide-y divide-gray-200 dark:divide-gray-700 space-y-6">
    @foreach($threads as $thread)
        <li class="py-6">
            <a href="{{ route('threads.show', $thread) }}" 
               class="block hover:bg-gray-100 dark:hover:bg-gray-700 p-6 rounded-lg transition shadow-md">

                <!-- Title -->
                <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                    {{ $thread->title }}
                </h2>

                <!-- Body -->
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    {{ $thread->body }}
                </p>

                <!-- Posted By & Date -->
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                    Posted by <span class="font-medium">{{ $thread->user->name }}</span> 
                    on {{ $thread->created_at->format('M d, Y') }}
                </p>

                <!-- Category & Reply Count (Placed Together) -->
                <div class="flex gap-2 mt-3">
                    <!-- Clickable Category Badge -->
                    @if($thread->category)
                        <span class="bg-yellow-200 dark:bg-yellow-700 text-yellow-800 dark:text-yellow-200 text-xs font-semibold px-3 py-1 rounded-full hover:bg-yellow-300 dark:hover:bg-yellow-600 transition">
                            {{ $thread->category->name }}
                        </span>
                    @endif

                    <!-- Reply Count Badge -->
                    <span class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-xs font-semibold px-3 py-1 rounded-full">
                        {{ $thread->replies_count }} {{ Str::plural('reply', $thread->replies_count) }}
                    </span>
                </div>

            </a>
        </li>
    @endforeach 
</ul>

                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Simple JavaScript for Showing Loading State -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let loading = document.getElementById("loading");
            loading.classList.remove("hidden");

            setTimeout(() => {
                loading.classList.add("hidden");
            }, 500);
        });
    </script>
</x-app-layout>
