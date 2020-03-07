@extends('layouts.guest')

@section('content')

<style>
    .btn-primary:hover{
        background-color: black !important;
    }
</style>

<div class="container-fluid">
    <div class="alert" style="background-color: black; color: white;">
        <h1>Order #{{$order->id}} paid!</h1>
        <p>Your order will be delivered as soon as possible</p>
    </div>

    <div class="card">
        <div class="card-header">Products in your order:</div>
        <div class="card-body">
            <div class="row">
            @foreach($order->products as $product)
                @php
                    $product = $product->product
                @endphp
                <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                    <div class="card" style="background: black;">
                        <div class="card-header" style="font-size: 30px;color: white; padding: 20px">
                            <i class="{{$product->category->icon}}" style="font-size: 60px;"></i><br><br>
                            {{$product->name}}
                            <p style="font-size: 19px; margin-top: 7px">{{$product->description}}</p>
                            <div style="margin: 5px 0px">{{ $product->price }}€</div>
                        </div>
                    </div>
                </div>

            @endforeach 
            </div>

            <button class="btn btn-primary">Go to menu</button>
        </div>
    </div>

</div>




@endsection