@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12 text-center">
        <a href="{{ url('/categories') }}">
            <div class="card" style="background: black">
                <div class="card-header" style="font-size: 30px;color: white; padding: 20px">
                    <i class="fas fa-list" style="font-size: 60px;"></i><br><br>
                    @lang('all.categories'): {{$categories->count()}}
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12 text-center">
        <a href="{{ url('/order') }}">
            <div class="card" style="background: black">
                <div class="card-header" style="font-size: 30px;color: white; padding: 20px">
                    <i class="fab fa-product-hunt" style="font-size: 60px;"></i><br><br>
                    @lang('all.products'): {{$products->count()}}
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12 text-center">
        <a href="{{ url('/orders') }}">
            <div class="card" style="background: black">
                <div class="card-header" style="font-size: 30px;color: white; padding: 20px">
                    <i class="fas fa-shopping-cart" style="font-size: 60px;"></i><br><br>
                    @lang('all.orders'): {{$orders->count()}}
                </div>
            </div>
        <a>
    </div>
</div>

@endsection