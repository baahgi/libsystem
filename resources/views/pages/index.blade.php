@extends('layouts.app')

@section('content')
<div class="flex flex-col px-8 mt-8">
    <div>
        <form action="{{ route('pages.index') }}" method="GET">
            <input name='q' class="h-8 form-input" type="search">
            <button type="submit" class="px-4 py-1 ml-2 text-white bg-blue-500 rounded focus:outline-none">search</button>
        </form>
    </div>
    <div class="flex items-center py-4 space-x-2">
        <p>Categories</p>
        <p>
            <form action="{{ route('pages.index') }}" method="GET">
                <select class="form-select" name="cat" onchange="this.form.submit()">
                    <option  disabled selected>All</option>
                    <option value="0">All</option>
                    @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" >{{ $cat->name }}</option>
                    @endforeach
                </select>
            </form>
        </p>
    </div>
    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
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
                STATUS
              </th>
              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
            </tr>
          </thead>
          <tbody class="bg-white">
              @foreach ($books  as $b)
              <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm font-medium leading-5 text-gray-900">{{ $b->isbn }} </div>

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
                    @if ($b->status)
                        Available
                    @else
                        Not available
                    @endif
                </div>
              </td>


            </tr>
            @endforeach
         </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
