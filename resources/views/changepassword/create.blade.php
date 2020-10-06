@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                    <div class="px-6 py-3 mb-0 font-semibold text-gray-700 bg-gray-200">
                        {{ __('Change Password') }}
                    </div>

                    <form class="w-full p-6" method="POST" action="{{ route('changepassword.store') }}">
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            <label for="password" class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Password') }}:
                            </label>

                            <input id="password" type="text" class="form-input w-full @error('password') border-red-500 @enderror" name="password" required>

                            @error('password')
                                <p class="mt-4 text-xs italic text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="new_password" class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('New Password') }}:
                            </label>

                            <input id="new_password" type="new_password" class="form-input w-full @error('new_password') border-red-500 @enderror" name="new_password" required>

                            @error('new_password')
                                <p class="mt-4 text-xs italic text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="password-confirmation" class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Confirm Password') }}:
                            </label>

                            <input id="password-confirmation" type="text" class="form-input w-full @error('new_password_confirmation') border-red-500 @enderror" name="new_password_confirmation" required>

                        </div>

                        <div class="flex flex-wrap items-center">
                            <button type="submit" class="px-4 py-2 font-bold text-gray-100 bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                {{ __('Login') }}
                            </button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
