@extends('layouts.guest')

@section('content')

@if(Session::has('order_type'))
    <script>
        alert('da');
    </script>
@endif
Menu
@endsection