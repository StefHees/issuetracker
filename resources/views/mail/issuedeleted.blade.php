@component('mail::message')

    The issue has been deleted.

    - Issue Id     : {{ $data['id'] }}
    - Title        : {{ $data['title'] }}
    - Description  : {!! $data['description'] !!}
    - Due-date     : {{ $data['due_at'] }}
    - Verwijderd op: {{ $data['deleted_at'] }}

@component('mail::button', ['url' => route('tasks.show', ['id' => $data['id']])])
    Open Issue
@endcomponent

    Thanks,<br>
    {{ config('app.name') }}

@endcomponent
