@extends('layouts.app')

@section('content')
<div class="flex flex-col">



    <div class="flex">

        @include('layouts.sidebar')

        <div class="flex-1 mt-4 ml-6 mr-2">
            <div class="flex items-center justify-between">
                <h3 class="my-3 text-xl font-semibold">Category</h3>
                <p class="text-xs">
                    Home > admin > category >show
                </p>
            </div>
            <div class="flex my-6 space-x-2">
                <a href="{{ route('categories.create') }}" class="inline-block px-4 py-1 text-white bg-blue-500 rounded">Add category</a>
            </div>
            <div class="w-full ">
                <p class="text-2xl font-semibold text-center ">
                    <span class="text-base text-gray-700 uppercase">{{ $category->title }}</span>
                    <span class="ml-8"> <a href="{{ route('categories.edit', $category) }}"
                        class="px-1 text-base text-green-500 border border-green-500 rounded-sm hovertext-green-400">Edit</a>
                    </span>
                    <span class="ml-8"> <a href="{{ route('categories.destroy', $category) }}">
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-1 font-medium text-white bg-red-500 rounded-sm hover:bg-red-400" >Delete</button>
                        </form>
                    </span>

                </p>

                <div class="flex flex-col mt-10 space-y-6">
                      <div class="flex">
                            <p class="w-1/4">Name:</p>
                            <p  class="w-3/4">{{ $category->name }}</p>
                      </div>

                </div>
            </div>
        </div>
  </div>
</div>
@endsection
