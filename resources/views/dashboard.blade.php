<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-blue-700 leading-tight flex items-center gap-2">
            <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6"></path>
            </svg>
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 via-blue-100 to-blue-200 min-h-screen">
        <div class="max-w-6xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl rounded-2xl mb-10">
                <div class="p-10 flex flex-col items-center">
                    <h3 class="text-3xl font-extrabold text-blue-700 mb-2 text-center">
                        Welcome, {{ Auth::user()->name }}!
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 text-center text-lg">
                        {{ __("You're logged in!") }}
                    </p>
                </div>
            </div>

            {{-- List Product --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-2xl p-8">
                <h3 class="text-2xl font-bold text-blue-700 mb-8 text-center">Product List</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    @forelse($products as $product)
                        <div class="border rounded-2xl shadow-lg hover:shadow-2xl transition flex flex-col bg-gradient-to-br from-blue-50 to-white">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                 class="h-56 w-full object-cover rounded-t-2xl border-b">
                            <div class="p-6 flex-1 flex flex-col">
                                <h4 class="font-bold text-xl mb-2 text-blue-700">{{ $product->name }}</h4>
                                <p class="text-gray-600 mb-4 flex-1">{{ $product->description }}</p>
                                <div class="flex items-center justify-between mt-auto">
                                    <span class="text-blue-600 font-bold text-lg">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                                    <a href="{{ route('productsdetail', $product->id) }}"
                                       class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm font-semibold transition shadow">
                                        View
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center text-gray-500 py-10">
                            No products found.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
