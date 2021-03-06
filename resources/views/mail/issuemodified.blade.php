@component('mail::message')

    This issue has been modified.

    - Issue Id     : {{ $data['id'] }}
    - Title        : {{ $data['title'] }}
    - Description  : {!! $data['description'] !!}
    - Due-date     : {{ $data['due_at'] }}

@component('mail::button', ['url' => route('tasks.show', ['id' => $data['id']])])
    Open Issue
@endcomponent

    Thanks,<br>
    {{ config('app.name') }}

@endcomponent
