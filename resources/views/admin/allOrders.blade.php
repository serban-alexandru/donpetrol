@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="alert" style="background-color: black; color: white;">
        <h1>@lang('all.orders')</h1>
    </div>

    <div class="table-responsive">

    <table class="table" style="text-align: center">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">@lang('all.type')</th>
            <th scope="col"><i class="fas fa-clock"></i></th>
            <th scope="col">@lang('all.amount')</th>
            <th scope="col">@lang('all.paid')</th>
            <th scope="col">@lang('all.payment_method')</th>
            <th scope="col">@lang('all.see_products')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $key=>$order)
            @php
                $sum = 0;
            @endphp
            @foreach($order->products as $product)
                @php
                    $sum += $product->quantity * $product->product->price;
                    $sum += $product->potatoes * env("FRIES_PRICE");
                    $sum += $product->mayo * env("MAYO_PRICE");
                @endphp
            @endforeach
            <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>
                Take away
                </td>
                <td>
                @if($order->delivery_time == '0')
                    As soon as possible
                @else
                    {{$order->delivery_time}}
                @endif
                </td>
                <td>€ {{$sum}} </td>
                <td>@if($order->paid == 1) Yes @else No @endif</td>
                <!-- <td>{{ $order->payment_method }}</td> -->
                <td>Online</td>
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
                            (€ {{$product->quantity * $product->product->price}})
                            <br>
                            + {{$product->potatoes}} <tag-random class="text-warning">X</tag-random> {{env("FRIES_NAME")}} (€ {{$product->potatoes * env("FRIES_PRICE")}}) <br> + {{$product->mayo}} <tag-random class="text-warning">X</tag-random> {{env("MAYO_NAME")}} (€ {{$product->mayo * env("MAYO_PRICE")}})

                        </div>
                    </div>   
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{ url('/print_order/'.$order->id) }}">
                        <button class="btn btn-success">Print order</button>
                    </a>
                    <a href="{{ url('/delete_order/'.$order->id) }}">
                        <button type="button" style="background:black" class="btn btn-primary">Delete order</button>
                    </a>
                </div>
                </div>
            </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="print{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Print Order #{{$order->id}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/print_order/'.$order->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Table number:</label>
                        <input name="table_number" type="number" min="50" max="62" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Print</button>
                </div>
                </form>
                </div>
            </div>
            </div>
        @endforeach
        </tbody>
    </table>

    </div>
</div>

@endsection