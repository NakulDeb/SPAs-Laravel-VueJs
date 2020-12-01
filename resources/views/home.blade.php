@extends('layouts.app')

@section('content')
    @if(!empty($myUser))
        <script>
            let myUser = '{!! json_encode($myUser) !!}';
            localStorage.setItem('user', myUser);
            localStorage.setItem('access_token', "{{$access_token}}");
            window.location.href = '/';

        </script>
    @endif
    <App></App>
@endsection
