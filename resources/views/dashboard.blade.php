<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    @php
        // Paginate 10 scans per page
        $scans = \App\Models\ScanResult::where('user_id', Auth::id())
                    ->latest()
                    ->paginate(10);

        $totalScans = $scans->total();
        $diseasedCount = \App\Models\ScanResult::where('user_id', Auth::id())
                            ->where('prediction', '!=', 'normal')
                            ->count();
        $healthyCount = \App\Models\ScanResult::where('user_id', Auth::id())
                            ->where('prediction', 'normal')
                            ->count();
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold mb-2 text-gray-700 dark:text-gray-300">
                    Welcome back, {{ Auth::user()->name }}
                </h3>
                <p class="text-gray-700 dark:text-gray-300">
                    Track your paddy health, explore treatments, and manage your scans efficiently.
                </p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-green-500 text-white rounded-lg shadow p-5">
                    <h4 class="text-lg font-semibold">Total Scans</h4>
                    <p class="text-2xl font-bold mt-2">{{ $totalScans }}</p>
                </div>
                <div class="bg-red-500 text-white rounded-lg shadow p-5">
                    <h4 class="text-lg font-semibold">Diseased Plants</h4>
                    <p class="text-2xl font-bold mt-2">{{ $diseasedCount }}</p>
                </div>
                <div class="bg-blue-500 text-white rounded-lg shadow p-5">
                    <h4 class="text-lg font-semibold">Healthy Plants</h4>
                    <p class="text-2xl font-bold mt-2">{{ $healthyCount }}</p>
                </div>
            </div>

            <!-- Recent Scans Table -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4 text-gray-700 dark:text-gray-300">Recent Scans</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead>
                        <tr class="text-gray-500 dark:text-gray-300 uppercase text-xs font-medium tracking-wider">
                            <th class="px-6 py-3 text-left">Date & Time</th>
                            <th class="px-6 py-3 text-left">Disease</th>
                            <th class="px-6 py-3 text-left">Confidence</th>
                            <th class="px-6 py-3 text-left">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600 text-gray-700 dark:text-gray-300">
                        @forelse($scans as $scan)
                            <tr>
                                <td class="px-6 py-4">{{ $scan->created_at->format('d M Y H:i') }}</td>
                                <td class="px-6 py-4 capitalize">{{ $scan->prediction }}</td>
                                <td class="px-6 py-4">{{ round($scan->confidence, 2) }}%</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('scan.result', $scan->id) }}" class="text-blue-500 hover:underline">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    No scans found.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $scans->links() }}
                </div>
            </div>

            <!-- Scan New Paddy Button -->
            <div class="flex justify-end">
                <a href="{{ route('scan') }}"
                   class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                    Scan New Paddy
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
