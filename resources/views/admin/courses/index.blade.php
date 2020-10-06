@extends('layouts.app')

@section('content')
<div class="flex flex-col">



    <div class="flex">

        @include('layouts.sidebar')

        <div class="flex-1 mt-4 ml-6 mr-2">
            <div class="flex items-center justify-between">
                <h3 class="my-3 text-xl font-semibold">Courses</h3>
                <p class="text-xs">
                    Home > admin > courses
                </p>
            </div>
            <div class="flex my-6 space-x-2">
                <a href="{{ route('courses.create') }}" class="inline-block px-4 py-1 text-white bg-blue-500 rounded">Add Courses</a>
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

                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                          </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($courses  as $c)
                            <tr>
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                  <div class="text-sm font-medium leading-5 text-gray-900">{{ $c->isbn }}</div>

                              </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-gray-900">
                                  {{ $c->name }}
                              </div>
                            </td>


                            <td class="flex px-6 py-4 space-x-2 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-green-500">
                                  <a href="{{ route('courses.edit', $c->id) }}">Edit</a>
                              </div>

                              <div class="text-sm leading-5 text-red-500">
                                  <form action="{{ route('courses.destroy', $c->id) }}" method="POST">
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
