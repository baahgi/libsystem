@component('mail::message')
# Welcome

You are now registed to {{ config('app.name') }}


<br>
Your ID: {{ $student->student_id }}
<br>
Your Name: {{ $student->name }}
<br>
Your Password: {{ $password }}
<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
