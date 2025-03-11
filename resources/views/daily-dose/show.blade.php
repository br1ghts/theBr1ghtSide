{{-- resources/views/daily-dose/show.blade.php --}}
<x-app-layout>
    <div class="min-h-screen bg-gradient-to-r from-blue-100 to-purple-100 flex items-center justify-center">
        <div class="bg-white p-10 rounded-xl shadow-2xl max-w-xl w-full mx-4">
            <h2 class="text-3xl font-extrabold mb-6 text-center text-gray-800">
                Daily Dose of Grit & Gratitude
            </h2>
            <div class="border-t-2 border-blue-500 mb-6"></div>
            <p class="text-lg text-gray-600 leading-relaxed">
                {{ $message }}
            </p>
        </div>
    </div>
</x-app-layout>
