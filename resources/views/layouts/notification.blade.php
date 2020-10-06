@if ($message = Session::get('success'))
<div class="p-2 my-1 text-green-600 bg-green-200 rounded">
    {{ $message }}
</div>
@endif

@if ($message = Session::get('info'))
<div class="p-2 my-1 text-blue-600 bg-blue-200 rounded">
    {{ $message }}
</div>
@endif

@if ($message = Session::get('danger'))
<div class="p-2 my-1 text-red-600 bg-red-200 rounded">
    {{ $message }}
</div>
@endif

@if ($message = Session::get('warning'))
<div class="p-2 my-1 text-orange-600 bg-orange-200 rounded">
    {{ $message }}
</div>
@endif
