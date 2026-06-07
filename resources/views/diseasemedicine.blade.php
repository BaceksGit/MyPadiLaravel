<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Diseases & Medicines') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300">
                <thead>
                <tr class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                    <th class="px-4 py-2 border">Disease</th>
                    <th class="px-4 py-2 border">Symptoms</th>
                    <th class="px-4 py-2 border">Cause</th>
                    <th class="px-4 py-2 border">Severity</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border">Disease Image</th>
                    <th class="px-4 py-2 border">Medicine</th>
                    <th class="px-4 py-2 border">Application</th>
                    <th class="px-4 py-2 border">Purchase Link</th>
                    <th class="px-4 py-2 border">Medicine Image</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr class="border hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <td class="px-4 py-2 border">{{ $item->disease_name }}</td>
                        <td class="px-4 py-2 border">{{ $item->symptoms }}</td>
                        <td class="px-4 py-2 border">{{ $item->cause }}</td>
                        <td class="px-4 py-2 border">{{ $item->severity_level }}</td>
                        <td class="px-4 py-2 border">{{ $item->description }}</td>
                        <td class="px-4 py-2 border">
                            @if($item->disease_image)
                                <img src="{{ asset('storage/' . $item->disease_image) }}"
                                     alt="{{ $item->disease_name }}"
                                     class="w-16 h-16 object-cover rounded">
                            @endif
                        </td>
                        <td class="px-4 py-2 border">{{ $item->medicine_name }}</td>
                        <td class="px-4 py-2 border">{{ $item->application_method }}</td>
                        <td class="px-4 py-2 border">
                            @if($item->purchase_link)
                                <a href="{{ $item->purchase_link }}" target="_blank"
                                   class="text-blue-500 underline">Buy</a>
                            @endif
                        </td>
                        <td class="px-4 py-2 border">
                            @if($item->medicine_image)
                                <img src="{{ asset('storage/' . $item->medicine_image) }}"
                                     alt="{{ $item->medicine_name }}"
                                     class="w-16 h-16 object-cover rounded">
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
