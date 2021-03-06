@component('mail::message')

    The user has been deleted.

    - User Id      : {{ $data['id'] }}
    - Name         : {{ $data['name'] }}
    - E-Mail       : {{ $data['email'] }}
    - Role         : {{ $data['role'] }}

@component('mail::button', ['url' => route('users.show', ['id' => $data['id']])])
        Open User
@endcomponent

    Thanks,<br>
    {{ config('app.name') }}

@endcomponent
