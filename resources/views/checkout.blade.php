@extends('layouts.guest')

@section('content')

<!-- @if(!Session::has('order_type'))
    <script>
        var url= "{{ url('/') }}"; 
        window.location = url; 
    </script>
@endif -->
<script>
</script>
<script>
// var d = new Date();
// var day = d.getDay();

// @foreach($days as $key=>$day)

//     // monday
//     @if($key == 0)
//         if(day == 1){
//             if(d.getHours() < {{$day->hour_start}} || d.getHours() > {{$day->hour_end}}){
//                 window.location = "{{ url('/service_closed') }}";
//             }else{
//                 if((d.getHours() == {{$day->hour_start}} && d.getMinutes() < {{$day->minutes_start}}) || (d.getHours() == {{$day->hour_end}} && d.getMinutes() > {{$day->minutes_end}})){
//                     window.location = "{{ url('/service_closed') }}";
//                 }
//             }
//         }
//     @endif

//     @if($key == 1)
//         if(day == 2){
//             if(d.getHours() < {{$day->hour_start}} || d.getHours() > {{$day->hour_end}}){
//                 window.location = "{{ url('/service_closed') }}";
//             }else{
//                 if((d.getHours() == {{$day->hour_start}} && d.getMinutes() < {{$day->minutes_start}}) || (d.getHours() == {{$day->hour_end}} && d.getMinutes() > {{$day->minutes_end}})){
//                     window.location = "{{ url('/service_closed') }}";
//                 }
//             }
//         }
//     @endif

//     @if($key == 2)
//         if(day == 3){
//             if(d.getHours() < {{$day->hour_start}} || d.getHours() > {{$day->hour_end}}){
//                 window.location = "{{ url('/service_closed') }}";
//             }else{
//                 if((d.getHours() == {{$day->hour_start}} && d.getMinutes() < {{$day->minutes_start}}) || (d.getHours() == {{$day->hour_end}} && d.getMinutes() > {{$day->minutes_end}})){
//                     window.location = "{{ url('/service_closed') }}";
//                 }
//             }
//         }
//     @endif

//     @if($key == 3)
//         if(day == 4){
//             if(d.getHours() < {{$day->hour_start}} || d.getHours() > {{$day->hour_end}}){
//                 window.location = "{{ url('/service_closed') }}";
//             }else{
//                 if((d.getHours() == {{$day->hour_start}} && d.getMinutes() < {{$day->minutes_start}}) || (d.getHours() == {{$day->hour_end}} && d.getMinutes() > {{$day->minutes_end}})){
//                     window.location = "{{ url('/service_closed') }}";
//                 }
//             }
//         }
//     @endif

//     @if($key == 4)
//         if(day == 5){
//             if(d.getHours() < {{$day->hour_start}} || d.getHours() > {{$day->hour_end}}){
//                 window.location = "{{ url('/service_closed') }}";
//             }else{
//                 if((d.getHours() == {{$day->hour_start}} && d.getMinutes() < {{$day->minutes_start}}) || (d.getHours() == {{$day->hour_end}} && d.getMinutes() > {{$day->minutes_end}})){
//                     window.location = "{{ url('/service_closed') }}";
//                 }
//             }
//         }
//     @endif

//     @if($key == 5)
//         if(day == 6){
//             if(d.getHours() < {{$day->hour_start}} || d.getHours() > {{$day->hour_end}}){
//                 window.location = "{{ url('/service_closed') }}";
//             }else{
//                 if((d.getHours() == {{$day->hour_start}} && d.getMinutes() < {{$day->minutes_start}}) || (d.getHours() == {{$day->hour_end}} && d.getMinutes() > {{$day->minutes_end}})){
//                     window.location = "{{ url('/service_closed') }}";
//                 }
//             }
//         }
//     @endif

//     @if($key == 6)
//         if(day == 0){
//             if(d.getHours() < {{$day->hour_start}} || d.getHours() > {{$day->hour_end}}){
//                 window.location = "{{ url('/service_closed') }}";
//             }else{
//                 if((d.getHours() == {{$day->hour_start}} && d.getMinutes() < {{$day->minutes_start}}) || (d.getHours() == {{$day->hour_end}} && d.getMinutes() > {{$day->minutes_end}})){
//                     window.location = "{{ url('/service_closed') }}";
//                 }
//             }
//         }
//     @endif

// @endforeach

// // if(day >= 1 && day <= 3){
// //     window.location = "{{ url('/service_closed') }}";
// // }

// // if(day == 4 || day == 5){
// //     if(d.getHours() < 18 || d.getHours() >= 23){
// //         window.location = "{{ url('/service_closed') }}";
// //     }
// // }

// // if(day == 6){
// //     if(d.getHours() < 12 || d.getHours() >= 23){
// //         window.location = "{{ url('/service_closed') }}";
// //     }
// // }

// // if(day == 0){
// //     if(d.getHours() < 12 || d.getHours() >= 21){
// //         window.location = "{{ url('/service_closed') }}";
// //     }
// // }

// setInterval(function(){
    
//     // console.log('da');
//     var d = new Date();
//     var day = d.getDay();
    
//     @foreach($days as $key=>$day)

//     // monday
//     @if($key == 0)
//         if(day == 1){
//             if(d.getHours() < {{$day->hour_start}} || d.getHours() > {{$day->hour_end}}){
//                 window.location = "{{ url('/service_closed') }}";
//             }else{
//                 if((d.getHours() == {{$day->hour_start}} && d.getMinutes() < {{$day->minutes_start}}) || (d.getHours() == {{$day->hour_end}} && d.getMinutes() > {{$day->minutes_end}})){
//                     window.location = "{{ url('/service_closed') }}";
//                 }
//             }
//         }
//     @endif

//     @if($key == 1)
//         if(day == 2){
//             if(d.getHours() < {{$day->hour_start}} || d.getHours() > {{$day->hour_end}}){
//                 window.location = "{{ url('/service_closed') }}";
//             }else{
//                 if((d.getHours() == {{$day->hour_start}} && d.getMinutes() < {{$day->minutes_start}}) || (d.getHours() == {{$day->hour_end}} && d.getMinutes() > {{$day->minutes_end}})){
//                     window.location = "{{ url('/service_closed') }}";
//                 }
//             }
//         }
//     @endif

//     @if($key == 2)
//         if(day == 3){
//             if(d.getHours() < {{$day->hour_start}} || d.getHours() > {{$day->hour_end}}){
//                 window.location = "{{ url('/service_closed') }}";
//             }else{
//                 if((d.getHours() == {{$day->hour_start}} && d.getMinutes() < {{$day->minutes_start}}) || (d.getHours() == {{$day->hour_end}} && d.getMinutes() > {{$day->minutes_end}})){
//                     window.location = "{{ url('/service_closed') }}";
//                 }
//             }
//         }
//     @endif

//     @if($key == 3)
//         if(day == 4){
//             if(d.getHours() < {{$day->hour_start}} || d.getHours() > {{$day->hour_end}}){
//                 window.location = "{{ url('/service_closed') }}";
//             }else{
//                 if((d.getHours() == {{$day->hour_start}} && d.getMinutes() < {{$day->minutes_start}}) || (d.getHours() == {{$day->hour_end}} && d.getMinutes() > {{$day->minutes_end}})){
//                     window.location = "{{ url('/service_closed') }}";
//                 }
//             }
//         }
//     @endif

//     @if($key == 4)
//         if(day == 5){
//             if(d.getHours() < {{$day->hour_start}} || d.getHours() > {{$day->hour_end}}){
//                 window.location = "{{ url('/service_closed') }}";
//             }else{
//                 if((d.getHours() == {{$day->hour_start}} && d.getMinutes() < {{$day->minutes_start}}) || (d.getHours() == {{$day->hour_end}} && d.getMinutes() > {{$day->minutes_end}})){
//                     window.location = "{{ url('/service_closed') }}";
//                 }
//             }
//         }
//     @endif

//     @if($key == 5)
//         if(day == 6){
//             if(d.getHours() < {{$day->hour_start}} || d.getHours() > {{$day->hour_end}}){
//                 window.location = "{{ url('/service_closed') }}";
//             }else{
//                 if((d.getHours() == {{$day->hour_start}} && d.getMinutes() < {{$day->minutes_start}}) || (d.getHours() == {{$day->hour_end}} && d.getMinutes() > {{$day->minutes_end}})){
//                     window.location = "{{ url('/service_closed') }}";
//                 }
//             }
//         }
//     @endif

//     @if($key == 6)
//         if(day == 0){
//             if(d.getHours() < {{$day->hour_start}} || d.getHours() > {{$day->hour_end}}){
//                 window.location = "{{ url('/service_closed') }}";
//             }else{
//                 if((d.getHours() == {{$day->hour_start}} && d.getMinutes() < {{$day->minutes_start}}) || (d.getHours() == {{$day->hour_end}} && d.getMinutes() > {{$day->minutes_end}})){
//                     window.location = "{{ url('/service_closed') }}";
//                 }
//             }
//         }
//     @endif

//     @endforeach

// }, 3000);
// </script>

<style>
    .col-md-6{
        margin-bottom: 20px !important;
    }
</style>
<div class="container">
<div class="text-center">
<h2>Afrekenen</h2>
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
        <!-- <small class="text-muted">({{$item->product->category->name}})</small> -->
        <small class="text-muted">
        + {{$item->potatoes}} x {{env("FRIES_NAME")}} (€ {{$item->potatoes * env("FRIES_PRICE")}}) <br> + {{$item->mayo}} x {{env("MAYO_NAME")}} (€ {{$item->mayo * env("MAYO_PRICE")}})
        </small>
        </div>
        <span class="text-muted">€ {{$item->quantity * $item->product->price}}</span>
    </li>
    @php
        $sum += $item->quantity * $item->product->price;
        $sum += $item->potatoes * env("FRIES_PRICE");
        $sum += $item->mayo * env("MAYO_PRICE");
    @endphp
    @endforeach
    <li class="list-group-item d-flex justify-content-between">
        <span>Total (EURO)</span>
        <strong>€ {{$sum}}</strong>
    </li>
    </ul>
</div>
<div class="col-md-8 order-md-1">
    <form action="{{ url('send_order') }}" method="POST">
    @csrf
    <!-- <div class="form-group">
        <h3 class="mb-3">Waar wil je dat je bestelling bezorgd wordt?</h3>
    </div> -->
    <!-- <div class="row">
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
                <input type="string" required name="postcode" placeholder="Adress" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label style="font-size: 20px">Plaatsnaam</label>
                <br>
                <input type="text" required name="place_name" placeholder="Plaatsnaam" class="form-control">
            </div>
        </div>
    </div> -->
    <div class="form-group">
        <h3 class="mb-3">Hoe ben je te bereiken?</h3>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label style="font-size: 20px">Naam</label>
                <br>
                <input type="text" value="{{ Auth::user()->name}}" required name="name" placeholder="Naam" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label style="font-size: 20px">E-mailadres</label>
                <br>
                <input type="text" value="{{ Auth::user()->email}}" required name="email" placeholder="E-mailadres" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label style="font-size: 20px">Telefoonnummer</label>
                <br>
                <input type="text" value="{{ Auth::user()->phone}}" required name="phone" placeholder="Telefoonnummer" class="form-control">
            </div>
        </div>
        <!-- <div class="col-md-6">
            <div class="form-group">
                <label style="font-size: 20px">Bedrijfsnaam</label>
                <br>
                <input type="text" value="{{ Auth::user()->street_and_house}}" required name="company_name" placeholder="Bedrijfsnaam" class="form-control">
            </div>
        </div>
        <br> -->
        <div class="col-md-6">
            <div class="form-group" style="margin-top: -10px">
                <label style="font-size: 20px">Gewenste afhaaltijd </label>
                <br>
                <select name="delivery_time" class="form-control" required>
                    <option value="0">Zo snel mogelijk</option>
                    <option value="1" required style="color: black" id="nextDate"></option>
                    <option value="2" required style="color: black" id="afterDate"></option>
                    <option value="3" required style="color: black" id="after2Date"></option>
                    <option value="3" required style="color: black" id="after3Date"></option>
                </select>
            </div>
        </div>
        <!-- <div class="col-md-6">
            <div class="form-group">
                <label style="font-size: 20px">Gewenste betaalmethode</label>
                <br>
                <select name="payment_method" required class="form-control">
                    <option value="" hidden>Choose</option>
                    <option value="cash">Cash</option>
                    <option value="online">Online</option>
                </select>
            </div>
        </div> -->
        <br>
        <div class="col-md-6">
            <div class="form-group">
                <label style="font-size: 20px">Opmerkingen voor het restaurant?</label>
                <br>
                <textarea rows="10" name="comments" placeholder="Opmerkingen" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <hr class="mb-4">
    <button class="btn btn-primary btn-lg btn-block" style="background: black" type="submit">Continue to checkout</button>
    </form>
</div>
</div>

<script>
var now = new Date();
if(now.getMinutes() <= 30){

    d1 = new Date();
    d2 = new Date();
    d2.setMinutes(d1.getMinutes() + 30-d1.getMinutes());
    d2.setSeconds(0);
    nextDate = d2;
    console.log(nextDate);
    if(d2.getMinutes() < 10){
    stri = '0';
    }else{
    stri = '';
    }
    var diffMs = (nextDate - new Date()); // milliseconds between dates
    var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes
    document.getElementById('nextDate').innerHTML = nextDate.getHours()+':'+nextDate.getMinutes()+stri;
    document.getElementById('nextDate').setAttribute('value', diffMins);

    d2.setMinutes(d2.getMinutes() + 30);
    afterDate = d2;
    console.log(afterDate);
    if(d2.getMinutes() < 10){
    stri = '0';
    }else{
    stri = '';
    }
    var diffMs = (afterDate - new Date()); // milliseconds between dates
    var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes
    document.getElementById('afterDate').innerHTML = afterDate.getHours()+':'+afterDate.getMinutes()+stri;
    document.getElementById('afterDate').setAttribute('value', diffMins);

    d2.setMinutes(d2.getMinutes() + 30);
    after2Date = d2;
    console.log(after2Date);
    if(d2.getMinutes() < 10){
    stri = '0';
    }else{
    stri = '';
    }
    var diffMs = (after2Date - new Date()); // milliseconds between dates
    var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000) + 60; // minutes
    document.getElementById('after2Date').innerHTML = after2Date.getHours()+':'+after2Date.getMinutes()+stri;
    document.getElementById('after2Date').setAttribute('value', diffMins);

    d2.setMinutes(d2.getMinutes() + 30);
    after3Date = d2;
    // console.log(after2Date);
    if(d2.getMinutes() < 10){
    stri = '0';
    }else{
    stri = '';
    }
    var diffMs = (after3Date - new Date()); // milliseconds between dates
    var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000) + 60; // minutes
    document.getElementById('after3Date').innerHTML = after3Date.getHours()+':'+after3Date.getMinutes()+stri;
    document.getElementById('after3Date').setAttribute('value', diffMins);

}else{
    d1 = new Date();
    d2 = new Date();
    d2.setHours(d1.getHours() + 1);
    d2.setMinutes(0);
    nextDate = d2;
    console.log(nextDate);
    if(d2.getMinutes() < 10){
    stri = '0';
    }else{
    stri = '';
    }
    var diffMs = (nextDate - new Date()); // milliseconds between dates
    var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes
    document.getElementById('nextDate').innerHTML = nextDate.getHours()+':'+nextDate.getMinutes()+stri;
    document.getElementById('nextDate').setAttribute('value', diffMins);

    d2.setMinutes(d2.getMinutes() + 30);
    afterDate = d2;
    console.log(afterDate);
    if(d2.getMinutes() < 10){
    stri = '0';
    }else{
    stri = '';
    }
    var diffMs = (afterDate - new Date()); // milliseconds between dates
    var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes
    document.getElementById('afterDate').innerHTML = afterDate.getHours()+':'+afterDate.getMinutes()+stri;
    document.getElementById('afterDate').setAttribute('value', diffMins);

    d2.setMinutes(d2.getMinutes() + 30);
    after2Date = d2;
    console.log(after2Date);
    if(d2.getMinutes() < 10){
    stri = '0';
    }else{
    stri = '';
    }
    var diffMs = (after2Date - new Date()); // milliseconds between dates
    var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000) + 60; // minutes
    document.getElementById('after2Date').innerHTML = after2Date.getHours()+':'+after2Date.getMinutes()+stri;
    document.getElementById('after2Date').setAttribute('value', diffMins);

    d2.setMinutes(d2.getMinutes() + 30);
    after3Date = d2;
    // console.log(after2Date);
    if(d2.getMinutes() < 10){
    stri = '0';
    }else{
    stri = '';
    }
    var diffMs = (after3Date - new Date()); // milliseconds between dates
    var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000) + 60; // minutes
    document.getElementById('after3Date').innerHTML = after3Date.getHours()+':'+after3Date.getMinutes()+stri;
    document.getElementById('after3Date').setAttribute('value', diffMins);

}

</script>

@endsection