@extends('layouts.app')

@section('content')
<div class="flex flex-col">



    <div class="flex">

        @include('layouts.sidebar')

        <div class="flex-1 mt-4 ml-6 mr-2">
            <div class="flex items-center justify-between">
                <h3 class="my-3 text-xl font-semibold">Borrows</h3>
                <form action="{{ route('borrow.search') }}" method="GET">
                    @csrf
                    <input class="h-8 form-input" type="search" name="q" id="q" placeholder="Student ID">
                    <button type="submit" class="px-4 py-1 text-white bg-blue-500 rounded focus:outline-none">search</button>
                </form>
                <p class="text-xs">
                    Home > admin > borrow
                </p>
            </div>
            <div class="flex my-6 space-x-2">
                <a href="{{ route('borrow.create') }}" class="inline-block px-4 py-1 text-white bg-blue-500 rounded">Issue Book</a>
            </div>
            <div class="w-full ">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                      <table class="min-w-full">
                        <thead>
                          <tr>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                              DATE
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                              STUDENT ID
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                              NAME
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                              ISBN
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                              TITLE
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                              Status
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                          </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($books  as $b)
                            <tr>
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                  <div class="text-sm font-medium leading-5 text-gray-900">{{ $b->borrow_date }}</div>

                              </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-gray-900">
                                  {{ $b->student_id }}
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-gray-900">
                                  {{ $b->name }}
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-gray-900">
                                  {{ $b->isbn }}
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-gray-900">
                                  {{ $b->title }}
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                              <div class="text-sm leading-5 text-gray-900">
                                  @if ($b->returned == 0)
                                      <span class="text-xs text-red-500 ">not returned</span>
                                    @else
                                      <span class="text-xs text-green-600 ">returned</span>
                                  @endif
                              </div>
                            </td>
                            <td class="flex px-6 py-4 space-x-2 whitespace-no-wrap border-b border-gray-200">
                                @if ($b->returned == 0)
                                <div class="text-sm leading-5 text-blue-500">
                                  <a href="{{ route('return.book', $b->id) }}" class="px-2 bg-blue-200">Return Book</a>
                              </div>
                              @endif
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
