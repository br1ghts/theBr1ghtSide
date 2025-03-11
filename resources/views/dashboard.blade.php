<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('The Bright Side') }}
        </h2>
    </x-slot>

    <div class="py-3">

        <div class="max-w-[95%] mx-auto">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- Daily Dose Component -->
                <div class="my-8">
                    <x-daily-dose :message="$dailyMessage" />
                </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- Daily Dose Component -->
                <div class="my-8">
                    <ul>
                        <li>Forums</li>
                        <li>Design Layout</li>
                        <li>Layout Content Creation Hub</li>
                    </ul>
                </div>
                </div>
            </div>

        </div>
        
    </div>
</x-app-layout>
