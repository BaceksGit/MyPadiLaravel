<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Scan Result') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Prediction Result -->
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 text-center">
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Prediction: {{ $data['prediction'] }}</h3>
                <h4 class="text-gray-700 dark:text-gray-300">Confidence: {{ $data['confidence'] }}%</h4>

                @if($data['confidence'] < 75)
                    <p class="mt-2 text-yellow-500 font-semibold">
                        ⚠️ Warning: The confidence level is below 75%. This result may not be accurate.
                    </p>
                @endif

                @if(isset($data['image_path']))
                    <div class="mt-4 w-64 h-64 mx-auto overflow-hidden rounded shadow">
                        <img src="{{ asset('storage/' . $data['image_path']) }}"
                             alt="Uploaded Image"
                             class="w-full h-full object-cover"/>
                    </div>
                @else
                    <p class="text-red-500 mt-2">⚠️ Image file missing on server.</p>
                @endif

                <!-- Scan Another Button -->
                <div class="mt-6 text-center">
                    <a href="{{ url()->previous() }}"
                       class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                        Scan Another
                    </a>
                </div>
            </div>

            <!-- Disease Info -->
            @if($disease)
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-2">Disease Details:</h3>
                    <p><strong>Symptoms:</strong> {{ $disease->symptoms }}</p>
                    <p><strong>Cause:</strong> {{ $disease->cause }}</p>
                    <p><strong>Severity:</strong> {{ $disease->severity_level }}</p>
                    <p><strong>Description:</strong> {{ $disease->description }}</p>

                    @if($disease->disease_image)
                        <div class="mt-2 w-48 h-48 overflow-hidden rounded flex items-center justify-center mx-auto">
                            <img src="{{ asset('storage/' . $disease->disease_image) }}"
                                 alt="{{ $disease->disease_name }}"
                                 class="w-full h-full object-cover"/>
                        </div>
                    @endif

                    <h3 class="text-md font-semibold mt-4">Recommended Medicine:</h3>
                    <p><strong>Name:</strong> {{ $disease->medicine_name }}</p>
                    <p><strong>Application Method:</strong> {{ $disease->application_method }}</p>

                    @if($disease->medicine_image)
                        <div class="mt-2 w-48 h-48 overflow-hidden rounded flex items-center justify-center mx-auto">
                            <img src="{{ asset('storage/' . $disease->medicine_image) }}"
                                 alt="{{ $disease->medicine_name }}"
                                 class="w-full h-full object-cover"/>
                        </div>
                    @endif

                    @if($disease->purchase_link)
                        <p class="mt-2 text-center">
                            <a href="{{ $disease->purchase_link }}" target="_blank"
                               class="inline-block bg-green-500 hover:bg-green-600 text-white dark:text-white px-4 py-2 rounded-lg font-semibold transition">
                                Buy Now
                            </a>
                        </p>
                    @endif

                </div>
            @else
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 text-center text-green-500 font-semibold">
                    No disease detected or it's a healthy leaf!
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
