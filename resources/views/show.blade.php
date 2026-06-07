<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Scan Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Prediction Result -->
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 text-center">
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">
                    Prediction: {{ $scan->prediction }}
                </h3>

                <h4 class="text-gray-700 dark:text-gray-300">
                    Confidence: {{ $scan->confidence }}%
                </h4>

                <p class="mt-4 text-xl font-bold text-gray-700 dark:text-gray-300 mb-4"><strong>Image:</strong></p>
                <img src="{{ asset('storage/' . $scan->image_path) }}"
                     alt="Scan Image"
                     class="mt-2 w-64 rounded-lg mx-auto">

                <p class="mt-4 text-gray-500 text-sm">
                    <strong>Date Scanned:</strong> {{ $scan->created_at->format('d M Y, h:i A') }}
                </p>
            </div>

        </div>
    </div>
</x-app-layout>
