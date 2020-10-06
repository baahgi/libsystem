@extends('layouts.app')

@section('content')
<div class="flex flex-col">



    <div class="flex">

        @include('layouts.sidebar')

        <div class="flex-1 mt-4 ml-6 mr-2">
            <div class="flex items-center justify-between">
                <h3 class="my-3 text-xl font-semibold">Dashboard</h3>
                <p class="text-xs">
                    Home > Dashboard
                </p>
            </div>
            <div class="grid w-full grid-cols-2 gap-4 lg:grid-cols-4">
                <div class="flex flex-col bg-blue-300">
                    <p class="px-2 text-3xl font-bold text-white">{{ $books->count() }}</p>
                    <p class="px-2 mt-4 text-lg font-semibold text-gray-100">Total Books</p>
                    <p class="p-1 mt-10 text-sm font-semibold text-center text-gray-300 bg-blue-500 -px-2">
                        <a href="{{ route('books.index') }}">More info</a>
                    </p>
                </div>
                <div class="bg-green-300">
                    <p class="px-2 text-3xl font-bold text-white">{{ $students->count() }}</p>
                    <p class="px-2 mt-4 text-lg font-semibold text-gray-100">Total Students</p>
                    <p class="p-1 mt-10 text-sm font-semibold text-center text-gray-300 bg-green-500 -px-2">
                        <a href="{{ route('students.index') }}">More info</a>
                    </p>
                </div>
                <div class="bg-pink-300">
                    <p class="px-2 text-3xl font-bold text-white">{{ $returnedBook->count() }}</p>
                    <p class="px-2 mt-4 text-lg font-semibold text-gray-100">Returned Books</p>
                    <p class="p-1 mt-10 text-sm font-semibold text-center text-gray-300 bg-pink-500 -px-2">
                        <a href="{{ route('return.index') }}">More info</a>
                    </p>
                </div>
                <div class="bg-red-300">
                    <p class="px-2 text-3xl font-bold text-white">{{ $borrowedBook->count() }}</p>
                    <p class="px-2 mt-4 text-lg font-semibold text-gray-100">Borrowed Books</p>
                    <p class="p-1 mt-10 text-sm font-semibold text-center text-gray-300 bg-red-500 -px-2">
                        <a href="{{ route('borrow.index') }}">More info</a>
                    </p>
                </div>
            </div>
        </div>
  </div>
</div>
@endsection
