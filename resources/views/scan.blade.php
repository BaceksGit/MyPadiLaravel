<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Scan Paddy Leaf ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 text-center">
                <h3 class="text-xl font-bold text-gray-700 dark:text-gray-300 mb-4">
                    Upload or Capture a Paddy Leaf
                </h3>

                <!-- Error Alert -->
                @if (session('error'))
                    <div class="mb-4 p-4 rounded-lg border border-red-500 bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300 font-semibold shadow">
                        {{ session('error') }}
                    </div>
                @endif

                <form id="scanForm" action="{{ route('scan.analyze') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- File Input -->
                    <input type="file" name="image" accept="image/*" capture="environment"
                           class="hidden" id="cameraInput" required>

                    <!-- Open file -->
                    <button type="button"
                            onclick="document.getElementById('cameraInput').click();"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold mb-4 transition">
                        Upload Image
                    </button>

                    <!-- Preview -->
                    <div id="preview" class="mb-4 hidden">
                        <img id="previewImage" class="mx-auto max-h-64 rounded shadow-lg border border-gray-300 dark:border-gray-700"/>
                    </div>

                    <!-- Analyze -->
                    <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                        Analyze
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const input = document.getElementById('cameraInput');
        const preview = document.getElementById('preview');
        const previewImg = document.getElementById('previewImage');

        input.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    previewImg.src = event.target.result;
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>
