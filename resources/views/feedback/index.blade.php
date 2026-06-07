<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Feedback Page') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('feedback.store') }}" method="POST" class="mb-6">
            @csrf
            <textarea name="message" rows="4" class="w-full border rounded p-2" placeholder="Type your feedback here..."></textarea>
            @error('message')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror

            <button type="submit" class="mt-3 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Submit Feedback
            </button>
        </form>

        <h3 class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">Recent Feedback</h3>
        @forelse($feedback as $item)
            <div class="border-b border-gray-300 py-2">
                <p class="text-gray-700">{{ $item->message }}</p>
                <small class="text-gray-500">
                    — {{ $item->user->name ?? 'Anonymous' }} • {{ $item->created_at->diffForHumans() }}
                </small>
                <!-- Admin Reply (if exists) -->
                @if($item->feedback_reply)
                    <div class="border-b border-gray-300 py-2 text-gray-700">
                        <strong class="dark:text-white">Reply by Admin:</strong> {{ $item->feedback_reply }}
                        <br>
                        <small class="text-gray-500">
                            — Admin • {{ $item->updated_at->diffForHumans() }}
                        </small>
                    </div>
{{--                @elseif(auth()->user()?->role === 'admin')--}}
{{--                    <!-- Show reply form for admins if no reply yet -->--}}
{{--                    <form action="{{ route('feedback.reply', $item) }}" method="POST" class="mt-2">--}}
{{--                        @csrf--}}
{{--                        <textarea name="feedback_reply" rows="2" class="w-full border rounded p-1" placeholder="Write a reply..."></textarea>--}}
{{--                        <button type="submit" class="mt-1 px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">--}}
{{--                            Reply--}}
{{--                        </button>--}}
{{--                    </form>--}}
                @endif
            </div>
        @empty
            <p class="text-gray-500">No feedback yet.</p>
        @endforelse
    </div>
</x-app-layout>
