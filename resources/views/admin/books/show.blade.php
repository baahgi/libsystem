@extends('layouts.app')

@section('content')
<div class="flex flex-col">



    <div class="flex">

        @include('layouts.sidebar')

        <div class="flex-1 mt-4 ml-6 mr-2">
            <div class="flex items-center justify-between">
                <h3 class="my-3 text-xl font-semibold">Books</h3>
                <p class="text-xs">
                    Home > admin > books >show
                </p>
            </div>
            <div class="flex my-6 space-x-2">
                <a href="{{ route('books.create') }}" class="inline-block px-4 py-1 text-white bg-blue-500 rounded">Add Book</a>
            </div>
            <div class="w-full ">
                <p class="text-2xl font-semibold text-center ">
                    <span class="text-base text-gray-700 uppercase">{{ $book->title }}</span>
                    <span class="ml-8"> <a href="{{ route('books.edit', $book) }}"
                        class="px-1 text-base text-green-500 border border-green-500 rounded-sm hovertext-green-400">Edit</a>
                    </span>
                    <span class="ml-8"> <a href="{{ route('books.destroy', $book) }}">
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-1 font-medium text-white bg-red-500 rounded-sm hover:bg-red-400" >Delete</button>
                        </form>
                    </span>

                </p>

                <div class="flex flex-col mt-10 space-y-6">
                      <div class="flex">
                            <p class="w-1/4">ISBN:</p>
                            <p  class="w-3/4">{{ $book->isbn }}</p>
                      </div>
                      <div class="flex mt-4">
                            <p  class="w-1/4">Title:</p>
                            <p  class="w-3/4 capitalize">{{ $book->title }}</p>
                      </div>
                      <div class="flex mt-4">
                            <p  class="w-1/4">Author:</p>
                            <p  class="w-3/4">{{ $book->author }}</p>
                      </div>
                      <div class="flex mt-4">
                            <p  class="w-1/4">Category:</p>
                            <p  class="w-3/4">{{ $book->category->name }}</p>
                      </div>
                      <div class="flex mt-4">
                            <p  class="w-1/4">Publisher:</p>
                            <p  class="w-3/4">{{ $book->publisher }}</p>
                      </div>
                      <div class="flex mt-4">
                            <p  class="w-1/4">Published Date:</p>
                            <p  class="w-3/4">{{ $book->published_date }}</p>
                      </div>
                </div>
            </div>
        </div>
  </div>
</div>
@endsection
