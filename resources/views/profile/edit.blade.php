<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl text-blue-700 leading-tight flex items-center gap-3">
            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
            </svg>
            {{ __('Profile Settings') }}
        </h2>
    </x-slot>

    <div class="py-16 bg-gradient-to-br from-blue-100 via-blue-200 to-blue-50 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 space-y-10">
            <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-3xl p-10 flex flex-col items-center">
                <h3 class="text-2xl font-bold text-blue-700 mb-6 text-center">Update Profile Information</h3>
                <div class="w-full">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-3xl p-10 flex flex-col items-center">
                <h3 class="text-2xl font-bold text-blue-700 mb-6 text-center">Change Password</h3>
                <div class="w-full">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-3xl p-10 flex flex-col items-center">
                <h3 class="text-2xl font-bold text-red-600 mb-6 text-center">Delete Account</h3>
                <div class="w-full">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
