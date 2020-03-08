@extends('layouts.admin')

@section('content')
    <!-- <div class="container-fluid"> -->
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
                    <div id="collapse{{$category->id}}" class="collapse  @if($category->id == $openCat) show @endif" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <h2>{{ $category->name }}</h2>
                        <h4>{{ $category->description }}</h4>
                        <div class="row">
                        <div class="col-md-12">
                        @foreach($category->subcategories as $subcat)
                            @if($subcat->products->count() > 0)
                            <h2 style="margin-bottom: -20px">{{ $subcat->name }}</h2>
                            @endif
                            <div class="row">
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
                                                <div style="margin: 5px 0px">€ {{ $product->price }}</div>
                                                <button class="btn btn-warning">Voeg toe</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        @endforeach
                        </div>
                        

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
                                            <div style="margin: 5px 0px">€ {{ $product->price }}</div>
                                            <button class="btn btn-warning">Voeg toe</button>
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
            </div>
        </div> 

    <!-- </div> -->
@endsection