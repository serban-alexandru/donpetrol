@extends('layouts.guest')

@section('content')

<style>
    .btn-primary:hover{
        background-color: black !important;
    }
    .text-warning{
        color: #E0BE7E !important;
    }
</style>

<div class="container-fluid">
    <div class="alert" style="background-color: black; text-align: center; color: white; border-radius: 10px">
        <h1 class="text-center text-warning">@lang('closed.message')</h1>
        <h2 class="text-center">@lang('closed.our_schedule'):</h2>
        <h4 class="text-center text-warning">@lang('closed.mo_we'): ----</h4>
        <h4 class="text-center text-warning">@lang('closed.th_fr'): 18:00 - 23:00</h4>
        <h4 class="text-center text-warning">@lang('closed.saturday'): 12:00 - 23:00</h4>
        <h4 class="text-center text-warning">@lang('closed.sunday'): 12:00 - 21:00</h4>
        <br>
        <a href="{{ url('/menu') }}">
            <button class="btn btn-warning">@lang('all.menu')</button>
        </a>
    </div>
</div>

@endsection