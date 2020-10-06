@extends('layouts.app')

@section('content')
<div class="flex flex-col">



    <div class="flex">

        @include('layouts.sidebar')

        <div class="flex-1 mt-4 ml-6 mr-2">
            <div class="flex items-center justify-between">
                <h3 class="my-3 text-xl font-semibold">Books</h3>
                <p class="text-xs">
                    Home > admin > books
                </p>
            </div>
            <div class="flex my-6 space-x-2">
                <a href="{{ route('books.create') }}" class="inline-block px-4 py-1 text-white bg-blue-500 rounded">Add Book</a>
            </div>
            <div class="w-full ">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                     {{-- book list --}}
                        <table class="min-w-full">
                        <thead>
                          <tr>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                              ISBN
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                              TITLE
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                              AUTHOR
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                              CATEGORY
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                              STATUS
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                          </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($books  as $b)
                            <tr>
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                  <div class="text-sm font-medium leading-5 text-gray-900">{{ $b->isbn }}</div>

                              </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-gray-900">
                                  {{ $b->title }}
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-gray-900">
                                  {{ $b->author }}
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-gray-900">
                                  {{ $b->category->name }}
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-gray-900">
                                  @if ($b->status)
                                      Available
                                    @else
                                        Not Available
                                  @endif
                              </div>
                            </td>
                            <td class="flex px-6 py-4 space-x-2 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-green-500">
                                  <a href="{{ route('books.edit', $b->id) }}">Edit</a>
                              </div>
                              <div class="text-sm leading-5 text-green-500">
                                  <a href="{{ route('books.show', $b->id) }}">Show</a>
                              </div>
                              <div class="text-sm leading-5 text-red-500">
                                  <form action="{{ route('books.destroy', $b->id) }}" method="POST">
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
