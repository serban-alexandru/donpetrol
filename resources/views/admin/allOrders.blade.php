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
                <td>{{$order->value}} €</td>
                <td>
                    <button data-toggle="modal" data-target="#view{{$order->id}}" class="btn" style="padding-top: 9px; padding-bottom: 9px">
                        <i class="fas fa-list-alt" style="font-size: 20px"></i>
                    </button>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="view{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order #{{$order->id}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Name: {{ $order->user->name }}</h4>
                    <h4>Type: Order 
                    <!-- @if($order->type == 'eat_in')
                    Eat in
                    @else
                    Take out
                    @endif -->
                    </h4>
                    <h4>Delivery time: 
                        @if($order->delivery_time == '0')
                            As soon as possible
                        @else
                            {{$order->delivery_time}}
                        @endif
                    </h4>
                    <!-- <h4>Street and house number: {{ $order->street_and_house }}</h4> -->
                    <h4>Phone number: {{ $order->phone }}</h4>
                    <!-- <h4>Postcode: {{ $order->postcode }}</h4> -->
                    <h4>Comments: "{{ $order->comments }}"</h4>
                    <h4>Ordered products:</h4>
                    @foreach($order->products as $product)
                    <div class="card" style="margin: 10px 0px">
                        <div class="card-header" style="font-size: 20px; border: 1px solid black">
                            {{$product->product->name}} <tag-random class="text-warning">X</tag-random> {{$product->quantity}}
                            <tag-random class="float-right">{{$product->product->price * $product->product->price}} €</tag-random>
                        </div>
                    </div>   
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" style="background:black" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>
        @endforeach
        </tbody>
    </table>

    </div>
</div>

@endsection