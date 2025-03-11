{{-- resources/views/forum/create.blade.php --}}
<x-app-layout>
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4  text-gray-900 dark:text-gray-100">Create a New Thread</h1>
    <form action="{{ route('threads.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label class="block text-gray-700 dark:text-gray-300">Category</label>
        <select name="category_id" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded">
            <option value="">Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 dark:text-gray-300">Title</label>
        <input type="text" name="title" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 dark:text-gray-300">Content</label>
        <textarea name="body" class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded"></textarea>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Create Thread
    </button>
</form>

</div>
</x-app-layout>
