@extends('layouts.guest')

@section('content')
<style>
    .col-md-6{
        margin-bottom: 20px !important;
    }
</style>
<div class="container">
<div class="text-center">
<h2>{{Route::currentRouteName()}}</h2>
<br>
<p class="lead"></p>
</div>

<div class="row">
<div class="col-md-4 order-md-2 mb-4">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-muted">Your cart</span>
    @php
        $count = 0;
    @endphp
    @foreach(Auth::user()->cartItems as $item)
        @php
            $count+=$item->quantity;
        @endphp
    @endforeach
    <span class="badge badge-secondary badge-pill">{{$count}}</span>
    </h4>
    <ul class="list-group mb-3">
    @php    
        $sum = 0;
    @endphp
    @foreach(Auth::user()->cartItems as $item)
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
        <h6 class="my-0">{{$item->product->name}} <tag-random class="text-warning">x</tag-random> {{$item->quantity}}</h6>
        <small class="text-muted">({{$item->product->category->name}})</small>
        </div>
        <span class="text-muted">${{$item->quantity * $item->product->price}}</span>
    </li>
    @php
        $sum += $item->quantity * $item->product->price;
    @endphp
    @endforeach
    <li class="list-group-item d-flex justify-content-between">
        <span>Total (USD)</span>
        <strong>${{$sum}}</strong>
    </li>
    </ul>
</div>
<div class="col-md-8 order-md-1">
    <form action="{{ url('submit_order') }}">
    <div class="form-group">
        <h3 class="mb-3">Waar wil je dat je bestelling bezorgd wordt?</h3>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label style="font-size: 20px">Straatnaam en huisnummer</label>
                <br>
                <input type="text" required name="street_and_house" placeholder="Adress" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label style="font-size: 20px">Postcode</label>
                <br>
                <input type="number" required name="postcode" min="1000" max="9999" placeholder="Adress" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label style="font-size: 20px">Plaatsnaam</label>
                <br>
                <input type="text" required name="place_name" placeholder="Plaatsnaam" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <h3 class="mb-3">Hoe ben je te bereiken?</h3>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label style="font-size: 20px">Naam</label>
                <br>
                <input type="text" required name="name" placeholder="Naam" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label style="font-size: 20px">E-mailadres</label>
                <br>
                <input type="text" required name="email" placeholder="E-mailadres" class="form-control">
            </div>
        </div>
        <br>
        <div class="col-md-6">
            <div class="form-group">
                <label style="font-size: 20px">Telefoonnummer</label>
                <br>
                <input type="text" required name="phone" placeholder="Telefoonnummer" class="form-control">
            </div>
        </div>
        <br>
        <div class="col-md-6">
            <div class="form-group">
                <label style="font-size: 20px">Bedrijfsnaam</label>
                <br>
                <input type="text" required name="company_name" placeholder="Bedrijfsnaam" class="form-control">
            </div>
        </div>
        <br>
        <div class="col-md-6">
            <div class="form-group">
                <label style="font-size: 20px">Gewenste bezorgtijd</label>
                <br>
                <select name="delivery_time" required class="form-control">
                    <option value="">Zo snel mogelijk</option>
                    <option value="">12:00</option>
                    <option value="">12:30</option>
                    <option value="">13:00</option>
                    <option value="">13:30</option>
                    <option value="">14:00</option>
                    <option value="">14:30</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label style="font-size: 20px">Opmerkingen voor het restaurant?</label>
                <br>
                <textarea required rows="10" name="comments" placeholder="Opmerkingen" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
    </form>
</div>
</div>

@endsection