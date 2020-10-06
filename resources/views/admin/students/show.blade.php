@extends('layouts.app')

@section('content')
<div class="flex flex-col">



    <div class="flex">

        @include('layouts.sidebar')

        <div class="flex-1 mt-4 ml-6 mr-2">
            <div class="flex items-center justify-between">
                <h3 class="my-3 text-xl font-semibold">Students</h3>
                <p class="text-xs">
                    Home > admin > students >show
                </p>
            </div>
            <div class="flex my-6 space-x-2">
                <a href="{{ route('students.create') }}" class="inline-block px-4 py-1 text-white bg-blue-500 rounded">Add student</a>
            </div>
            <div class="w-full ">
                <p class="text-2xl font-semibold text-center ">
                    <span class="text-base text-gray-700 uppercase">{{ $student->name }}</span>
                    <span class="ml-8"> <a href="{{ route('students.edit', $student) }}"
                        class="px-1 text-base text-green-500 border border-green-500 rounded-sm hovertext-green-400">Edit</a>
                    </span>
                    <span class="ml-8"> <a href="{{ route('students.destroy', $student) }}">
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-1 font-medium text-white bg-red-500 rounded-sm hover:bg-red-400" >Delete</button>
                        </form>
                    </span>

                </p>

                <div class="flex flex-col mt-10 space-y-6">
                      <div class="flex">
                            <p class="w-1/4">Email:</p>
                            <p  class="w-3/4">{{ $student->email }}</p>
                      </div>
                      <div class="flex mt-4">
                            <p  class="w-1/4">Name:</p>
                            <p  class="w-3/4 capitalize">{{ $student->name }}</p>
                      </div>
                      <div class="flex mt-4">
                            <p  class="w-1/4">course:</p>
                            <p  class="w-3/4">{{ $student->course->name }}</p>
                      </div>
                      @if ($student->photo)
                      <div class="flex mt-4">
                            <p  class="w-1/4">photo:</p>
                            <p  class="w-3/4">
                                <img src="{{ asset('storage/'.$student->photo) }}" alt="profile image" class="object-contain w-32 h-32">
                            </p>
                        </div>
                        @endif

                </div>
            </div>
        </div>
  </div>
</div>
@endsection
