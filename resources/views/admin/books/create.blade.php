@extends('layouts.app')

@section('content')
<div class="flex flex-col">



    <div class="flex">

        @include('layouts.sidebar')

        <div class="flex-1 mt-4 ml-6 mr-2">
            <div class="flex items-center justify-between">
                <h3 class="my-3 text-xl font-semibold">Books</h3>
                <p class="text-xs text-gray-700">
                    Home > admin > books > create
                </p>
            </div>
            <div class="w-full">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full max-w-sm">
                        <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                            <div class="px-6 py-3 mb-0 font-semibold text-gray-700 bg-gray-200">
                                {{ __('Register') }}
                            </div>

                            <form class="w-full p-6" method="POST" action="{{ route('books.store') }}">
                                @csrf

                                <div class="flex flex-wrap mb-6">
                                    <label for="isbn" class="block mb-2 text-sm font-bold text-gray-700">
                                        {{ __('ISbN') }}:
                                    </label>

                                    <input id="isbn" type="text" class="form-input w-full @error('isbn')  border-red-500 @enderror" name="isbn" value="{{ old('isbn') }}" required autocomplete="isbn" autofocus>

                                    @error('isbn')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-wrap mb-6">
                                    <label for="title" class="block mb-2 text-sm font-bold text-gray-700">
                                        {{ __('Title') }}:
                                    </label>

                                    <input id="title" type="text" class="form-input w-full @error('title')  border-red-500 @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-wrap mb-6">
                                    <label for="category" class="block mb-2 text-sm font-bold text-gray-700">
                                        {{ __('Category') }}:
                                    </label>

                                    <select name="category" id="category" class="w-full form-select">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-wrap mb-6">
                                    <label for="author" class="block mb-2 text-sm font-bold text-gray-700">
                                        {{ __('Author') }}:
                                    </label>

                                    <input id="author" type="text" class="form-input w-full @error('author')  border-red-500 @enderror" name="author" value="{{ old('author') }}" required autocomplete="author" autofocus>

                                    @error('author')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-wrap mb-6">
                                    <label for="publisher" class="block mb-2 text-sm font-bold text-gray-700">
                                        {{ __('Publisher') }}:
                                    </label>

                                    <input id="publisher" type="text" class="form-input w-full @error('publisher')  border-red-500 @enderror" name="publisher" value="{{ old('publisher') }}" required autocomplete="publisher" autofocus>

                                    @error('publisher')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                <div class="flex flex-wrap mb-6">
                                    <label for="publish_date" class="block mb-2 text-sm font-bold text-gray-700">
                                        {{ __('publish_date') }}:
                                    </label>

                                    <input id="publish_date" type="date" class="form-input w-full @error('publish_date')  border-red-500 @enderror" name="publish_date" value="{{ old('publish_date') }}" required autocomplete="publish_date" autofocus>

                                    @error('publish_date')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>









                                <div class="flex flex-wrap">
                                    <button type="submit" class="inline-block px-4 py-2 text-base font-bold leading-normal text-center text-gray-100 no-underline whitespace-no-wrap align-middle bg-blue-500 border rounded select-none hover:bg-blue-700">
                                        {{ __('Add') }}
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
