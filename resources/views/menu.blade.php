@extends('layouts.guest')

@section('content')
<!-- 
@if(!Session::has('order_type'))
    <script>
        var url= "{{ url('/') }}"; 
        window.location = url; 
    </script>
@endif -->

<div class="container-fluid">
        <div class="alert" style="background-color: black; color: white;">
            <h1>Menu</h1>
        </div>

        <div id="accordion">
            <div class="buttons">
            @foreach($categories as $category)
            @if(!$category->category_id)
                <button class="btn btn-warning" data-toggle="collapse" data-target="#collapse{{$category->id}}" aria-expanded="true" aria-controls="collapse{{$category->id}}">
                {{$category->name}}
                </button>
            @endif
            @endforeach
            </div>
            @foreach($categories as $category)
                @foreach($category->products as $product)
                    <style>
                    form #input-wrap {
                    margin: 0px;
                    padding: 0px;
                    }

                    input#number{{$product->id}} {
                    text-align: center;
                    border: none;
                    border-top: 1px solid #ddd;
                    border-bottom: 1px solid #ddd;
                    margin: 0px;
                    width: 40px;
                    height: 40px;
                    }

                    input[type=number]::-webkit-inner-spin-button,
                    input[type=number]::-webkit-outer-spin-button {
                        -webkit-appearance: none;
                        margin: 0;
                    }
                    </style>
                    <script>
                    function increaseValue{{$product->id}}() {
                    var value = parseInt(document.getElementById('number{{$product->id}}').value, 10);
                    value = isNaN(value) ? 0 : value;
                    value++;
                    document.getElementById('number{{$product->id}}').value = value;
                    }

                    function decreaseValue{{$product->id}}() {
                    var value = parseInt(document.getElementById('number{{$product->id}}').value, 10);
                    value = isNaN(value) ? 0 : value;
                    value < 1 ? value = 1 : '';
                    value--;
                    document.getElementById('number{{$product->id}}').value = value;
                    }
                    </script>
                @endforeach
            @endforeach
            <div style="margin-top: 20px">
            @foreach($categories as $category)
                <div class="card" style="margin: 0px">
                    <div id="collapse{{$category->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <h1>{{ $category->name }}</h1>
                        <h4>{{ $category->description }}</h4>
                        <div class="row">
                        @foreach($category->subcategories as $subcat)

                            @foreach($subcat->products as $product)
                                <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                                    <div class="card" style="background: black;">
                                        <div class="card-header" style="font-size: 30px;color: white; padding: 20px">
                                            <i class="{{$product->category->icon}}" style="font-size: 60px;"></i><br><br>
                                            {{$product->name}}
                                            <p style="font-size: 19px; margin-top: 7px">{{$product->description}}</p>
                                            <form style="margin-top: 10px" action="{{ url('/add_to_cart/'.$product->id) }}" method="POST">
                                                @csrf
                                                <button style="margin-top: 1px" type="button" class="btn btn-warning" id="decrease" onclick="decreaseValue{{$product->id}}()">-</button>
                                                <input type="number" name="quantity" id="number{{$product->id}}" value="1" min="1" />
                                                <button style="margin-top: 1px" type="button" class="btn btn-warning" id="increase" onclick="increaseValue{{$product->id}}()">+</button>
                                                <div style="margin: 5px 0px">{{ $product->price }}€</div>
                                                <button class="btn btn-warning">Add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        @endforeach

                        @foreach($category->products as $product)
                            <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                                <div class="card" style="background: black;">
                                    <div class="card-header" style="font-size: 30px;color: white; padding: 20px">
                                        <i class="{{$product->category->icon}}" style="font-size: 60px;"></i><br><br>
                                        {{$product->name}}
                                        <p style="font-size: 19px; margin-top: 7px">{{$product->description}}</p>
                                        <form style="margin-top: 10px" action="{{ url('/add_to_cart/'.$product->id) }}" method="POST">
                                            @csrf
                                            <button style="margin-top: 1px" type="button" class="btn btn-warning" id="decrease" onclick="decreaseValue{{$product->id}}()">-</button>
                                            <input type="number" name="quantity" id="number{{$product->id}}" value="1" min="1" />
                                            <button style="margin-top: 1px" type="button" class="btn btn-warning" id="increase" onclick="increaseValue{{$product->id}}()">+</button>
                                            <div style="margin: 5px 0px">{{ $product->price }}€</div>
                                            <button class="btn btn-warning">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>

                    </div>
                    </div>
                </div>
            @endforeach
                <!-- <div class="card" style="margin: 0px">
                    <div id="collapse2" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                                <div class="card" style="background: black">
                                    <div class="card-header" style="font-size: 30px;color: white; padding: 20px">
                                        <i class="fab fa-product-hunt" style="font-size: 60px;"></i><br><br>
                                        Product name
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                                <div class="card" style="background: black">
                                    <div class="card-header" style="font-size: 30px;color: white; padding: 20px">
                                        <i class="fab fa-product-hunt" style="font-size: 60px;"></i><br><br>
                                        Product name
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                                <div class="card" style="background: black">
                                    <div class="card-header" style="font-size: 30px;color: white; padding: 20px">
                                        <i class="fab fa-product-hunt" style="font-size: 60px;"></i><br><br>
                                        Product name
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
                <div class="card" style="margin: 0px">
                    <div id="collapse3" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                    </div>
                </div> -->
            </div>
        </div> 

    </div>
@endsection