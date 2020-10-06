@extends('layouts.app')

@section('content')
<div class="flex flex-col">



    <div class="flex">

        @include('layouts.sidebar')

        <div class="flex-1 mt-4 ml-6 mr-2">
            <div class="flex items-center justify-between">
                <h3 class="my-3 text-xl font-semibold">Student</h3>
                <p class="text-xs text-gray-700">
                    Home > admin > books > edit
                </p>
            </div>
            <div class="w-full">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full max-w-sm">
                        <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                            <div class="px-6 py-3 mb-0 font-semibold text-gray-700 bg-gray-200">
                                {{ __('Edit Student') }}
                            </div>

                            <form class="w-full p-6" method="POST" action="{{ route('students.update', $student) }}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="flex flex-wrap mb-6">
                                    <label for="name" class="block mb-2 text-sm font-bold text-gray-700">
                                        {{ __('Name') }}:
                                    </label>

                                    <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror" name="name" value="{{ old('name') ?? $student->name }}" >

                                    @error('name')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-wrap mb-6">
                                    <label for="email" class="block mb-2 text-sm font-bold text-gray-700">
                                        {{ __('Email') }}:
                                    </label>

                                    <input id="email" type="email" class="form-input w-full @error('email')  border-red-500 @enderror" name="email" value="{{ old('email') ?? $student->email }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>



                                <div class="flex flex-wrap mb-6">
                                    <label for="course" class="block mb-2 text-sm font-bold text-gray-700">
                                        {{ __('Course') }}:
                                    </label>

                                    <select name="course" id="course" class="w-full form-select">
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}" {{ $course->id == $student->course_id ? 'selected': '' }}>{{ $course->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('course')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>



                                <div class="flex flex-wrap mb-6">
                                    <label for="photo" class="block mb-2 text-sm font-bold text-gray-700">
                                        {{ __('Photo') }}:
                                    </label>

                                    <input id="photo" type="file" class="form-input w-full @error('photo')  border-red-500 @enderror" name="photo" value="{{ old('photo') }}" >

                                    @error('photo')
                                        <p class="mt-4 text-xs italic text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>





                                <div class="flex flex-wrap">
                                    <button type="submit" class="inline-block px-4 py-2 text-base font-bold leading-normal text-center text-gray-100 no-underline whitespace-no-wrap align-middle bg-blue-500 border rounded select-none hover:bg-blue-700">
                                        {{ __('Update') }}
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
