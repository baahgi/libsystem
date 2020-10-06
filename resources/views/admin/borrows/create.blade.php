@extends('layouts.app')

@section('content')
<div class="flex flex-col">



    <div class="flex">

        @include('layouts.sidebar')

        <div class="flex-1 mt-4 ml-6 mr-2">
            <div class="flex items-center justify-between">
                <h3 class="my-3 text-xl font-semibold">Borrow Book</h3>
                <p class="text-xs text-gray-700">
                    Home > admin > borrow >create
                </p>
            </div>
            <div class="w-full">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full max-w-sm">
                        <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                            <div class="px-6 py-3 mb-0 font-semibold text-gray-700 bg-gray-200">
                                {{ __('Issue Book') }}
                            </div>

                            <form class="w-full p-6" method="POST" action="{{ route('borrow.store') }}">
                                @csrf

                                <div class="flex flex-wrap mb-6">
                                    <label for="isbn" class="block mb-2 text-sm font-bold text-gray-700">
                                        {{ __('ISBN') }}:
                                    </label>

                                    <input id="isbn" type="text" class="form-input w-full @error('isbn')  border-red-500 @enderror" name="isbn" value="{{ old('isbn') }}" required autocomplete="isbn" autofocus>

                                    @error('isbn')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-wrap mb-6">
                                    <label for="student_id" class="block mb-2 text-sm font-bold text-gray-700">
                                        {{ __('Student Id') }}:
                                    </label>

                                    <input id="student_id" type="text" class="form-input w-full @error('student_id')  border-red-500 @enderror" name="student_id" value="{{ old('student_id') }}" required autocomplete="student_id" autofocus>

                                    @error('student_id')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>




                                <div class="flex flex-wrap">
                                    <button type="submit" class="inline-block px-4 py-2 text-base font-bold leading-normal tracking-wider text-center text-gray-100 no-underline whitespace-no-wrap align-middle bg-blue-500 border rounded select-none hover:bg-blue-700">
                                        {{ __('Issue Book') }}
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>
@endsection
