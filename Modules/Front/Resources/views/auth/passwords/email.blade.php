@component('mail::message')

Reset password {{ $data['user']->full_name }}'s acccount

@component('mail::button', ['url' => route('reset_password' , $data['token']) ])
Click To Reset Your Password
@endcomponent

OR<br>
Copy This Link

<a href="{{ route('reset_password' , $data['token']) }}"> {{ route('reset_password' , $data['token']) }} </a>

Thanks,<br>
@endcomponent
