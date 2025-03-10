{{-- resources/views/forum/create.blade.php --}}
<x-app-layout>
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4  text-gray-900 dark:text-gray-100">Create a New Thread</h1>
    <form action="{{ route('threads.store') }}" method="POST" class="bg-white shadow-md rounded p-6">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full border border-gray-300 rounded p-2" value="{{ old('title') }}" required>
        </div>
        <div class="mb-4">
            <label for="body" class="block text-gray-700">Content</label>
            <textarea name="body" id="body" rows="5" class="mt-1 block w-full border border-gray-300 rounded p-2" required>{{ old('body') }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Post Thread</button>
    </form>
</div>
</x-app-layout>
