@component('mail::message')
# {{ ucwords( $book->title) }}

was borrowed by you {{ $bookBorrowed->borrow_date }}.


Please return it on {{ $bookBorrowed->return_date }}


<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
