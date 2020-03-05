@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="alert" style="background-color: black; color: white;">
        <h1>Orders</h1>
    </div>

    <div class="table-responsive">

    <table class="table" style="text-align: center">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Type</th>
            <th scope="col">Delivery time</th>
            <th scope="col">Value</th>
            <th scope="col">View all</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $key=>$order)
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>
                @if($order->type == 'eat_in')
                Eat in
                @else
                Take out
                @endif
                </td>
                <td>
                @if($order->delivery_time == '0')
                    As soon as possible
                @else
                    {{$order->delivery_time}}
                @endif
                </td>
                <td>{{$order->value}}$</td>
                <td>
                    <button class="btn" style="padding-top: 9px; padding-bottom: 9px">
                        <i class="fas fa-list-alt" style="font-size: 20px"></i>
                    </button>
                </td>
                <td style="max-width: 300px; width: 300px">
                    <button class="btn btn-success">
                        <i class="fas fa-check"></i>
                    </button>
                    <button class="btn btn-warning">
                        <i class="fas fa-times"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </div>
</div>

@endsection