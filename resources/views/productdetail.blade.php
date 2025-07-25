{{-- filepath: c:\laragon\www\ecommerce\resources\views\productdetail.blade.php --}}
<x-app-layout>
    <div class="py-16 bg-gradient-to-br from-blue-100 via-blue-200 to-blue-50 min-h-screen">
        <div class="max-w-2xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl rounded-3xl p-12">
                <div class="flex flex-col items-center">
                    <div class="relative w-full mb-8">
                        <img src="/images/{{ $product->image }}" alt="{{ $product->name }}"
                             class="h-96 w-full object-cover rounded-3xl border shadow-xl">
                        <span class="absolute top-6 left-6 bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow">
                            Featured
                        </span>
                    </div>
                    <h2 class="text-4xl font-extrabold text-blue-700 mb-4 text-center">{{ $product->name }}</h2>
                    <span class="text-blue-600 font-bold text-3xl mb-6">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                    <div class="mb-8 w-full">
                        <p class="text-gray-700 dark:text-gray-200 text-center text-xl leading-relaxed">
                            {{ $product->description }}
                        </p>
                    </div>
                    <div class="flex gap-6">
                        <a href="{{ route('dashboard') }}"
                           class="px-8 py-3 bg-gray-200 text-gray-700 rounded-xl hover:bg-gray-300 font-semibold transition shadow text-lg">
                            Back
                        </a>
                        <button class="px-8 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 font-semibold transition shadow text-lg">
                            Beli
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
