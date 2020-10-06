@extends('layouts.app')

@section('content')
<div class="flex flex-col">



    <div class="flex">

        @include('layouts.sidebar')

        <div class="flex-1 mt-4 ml-6 mr-2">
            <div class="flex items-center justify-between">
                <h3 class="my-3 text-xl font-semibold">Students</h3>
                <p class="text-xs">
                    Home > admin > students
                </p>
            </div>
            <div class="flex my-6 space-x-2">
                <a href="{{ route('students.create') }}" class="inline-block px-4 py-1 text-white bg-blue-500 rounded">Add Student</a>
            </div>
            <div class="w-full ">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                      <table class="min-w-full">
                        <thead>
                          <tr>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                              NAME
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                              EMAIL
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                              ID
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                              COURSE
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                          </tr>
                        </thead>
                        <tbody class="bg-white">

                            {{-- //this means for each item in the students database --}}

                            @foreach ($students  as $s)
                            <tr>
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center space-x-3">
                                    @if ($s->photo)
                                    <img src="{{ asset('storage/'.$s->photo) }}" alt="profile image" class="object-cover w-12 h-12">
                                    @else
                                    <svg class="w-12 h-12 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                    </svg>
                                    @endif
                                    <div class="text-sm font-medium leading-5 text-gray-900">{{ $s->name }}</div>
                                </div>

                              </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-gray-900">
                                  {{ $s->email }}
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-gray-900">
                                  {{ $s->student_id }}
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-gray-900">
                                  @if ($s->course)
                                  {{ $s->course->name }}
                                  @endif
                              </div>
                            </td>
                            <td class="flex px-6 py-4 space-x-2 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-green-500">
                                  <a href="{{ route('students.edit', $s->id) }}">Edit</a>
                              </div>
                              <div class="text-sm leading-5 text-green-500">
                                  <a href="{{ route('students.show', $s->id) }}">Show</a>
                              </div>
                              <div class="text-sm leading-5 text-red-500">
                                  <form action="{{ route('students.destroy', $s->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                      <button class="focus:outline-none focus:text-red-400">Delete</button>
                                  </form>
                              </div>
                            </td>


                          </tr>
                          @endforeach
                       </tbody>
                      </table>
                    </div>
                  </div>
            </div>
        </div>
  </div>
</div>
@endsection

