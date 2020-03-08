@guest
    @if(Session::has('cartItems'))
    @php
      $count = 0;
    @endphp
    @foreach(Session::get('cartItems') as $key=>$item)
            @php
              $count += $item->quantity;
            @endphp
    @endforeach
    <!-- Cart button -->
    <button data-toggle="modal" data-target="#cart" style="position: fixed; bottom: 10px; right: 10px; padding: 10px; border-radius: 20px; font-size: 20px" class="btn btn-warning"><i style="font-size: 40px" class="fas fa-shopping-cart"></i> ({{$count}})</button>

    <!-- Modal Cart -->
    <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin: 0px">
        <div class="modal-content" style="width: 100vw; min-height: 100vh">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Uw bestelling</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            @php
              $sum=0;
            @endphp

            @foreach(Session::get('cartItems') as $item)
            @php
              $sum+=$item->product_price * $item->quantity;
            @endphp
            <style>
              @media screen and (max-width: 441px){

                .btns-cart{
                  margin-top: 20px
                }

              }
            </style>
            <div class="card" style="margin: 0px">
              <div class="card-header">
                <tag-random style="font-size: 20px;">{{$item->quantity}} x {{$item->product_name}} = € {{$item->product_price * $item->quantity}}</tag-random>
                <div class="float-right btns-cart">
                  <button data-toggle="modal" data-target="#delete{{$item->product_id}}" class="btn btn-danger" style="margin-top: -10px"><i class="fas fa-trash"></i></button>
                  <button data-toggle="modal" data-target="#edit{{$item->product_id}}" class="btn btn-warning" style="margin-top: -10px"><i class="fas fa-edit"></i></button>
                </div>
              </div>
            </div>
            <br>
            @endforeach
            <form action="{{ url('/send_order')}}" method="POSt">
            @csrf
            <div class="">

              <div class="alert alert-success" style="float: left;font-size: 16px; padding: 17px;background-color:black">
              Totaal:€ {{$sum}}
              </div>
              <br><br><br>
              <a href="{{ url('/checkout') }}">
                <button class="btn btn-success" type="button" style="padding: 17px; margin-left: -2px;background-color:black">
                Afrekenen
                </button>
              </a>
            </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" style="background-color:black" data-dismiss="modal">Sluiten</button>
          </div>
        </div>
      </div>
    </div>

    @foreach(Session::get('cartItems') as $key=>$item)
      <!-- Modal edit quantity-->
      <div class="modal fade" id="edit{{$item->product_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bewerk {{$item->product_name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ url('/edit_product_quantity/'.$item->product_id) }}" method="POST">
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <label>Hoeveelheid:</label>
                <input name="quantity" type="number" min="1" reqired value="{{ $item->quantity }}" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
              <button type="submit" class="btn btn-warning">Wijzigingen opslaan</button>
            </div>
          </form>
        </div>
      </div>
      </div>

      <!-- Modal remove -->
      <div class="modal fade" id="delete{{$item->product_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Remove {{$item->product_name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Ben je zeker dat je<tag-random class="text-danger">dit product</tag-random> wilt annuleren?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
            <a href="{{ url('/remove_product_from_cart/'.$item->product_id) }}"><button type="button" class="btn btn-danger">Remove</button></a>
          </div>
        </div>
      </div>
      </div>
    @endforeach
    @else

        <!-- Cart button -->
        <button data-toggle="modal" data-target="#cart" style="position: fixed; bottom: 10px; right: 10px; padding: 10px; border-radius: 20px; font-size: 20px" class="btn btn-warning"><i style="font-size: 40px" class="fas fa-shopping-cart"></i> (0)</button>

    @endif

@endguest
  
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
      document.getElementById('nextDate').innerHTML = nextDate.getHours()+':'+nextDate.getMinutes()+stri;
      document.getElementById('nextDate').setAttribute('value', nextDate.getHours()+':'+nextDate.getMinutes()+stri);

      d2.setMinutes(d2.getMinutes() + 30);
      afterDate = d2;
      console.log(afterDate);
      if(d2.getMinutes() < 10){
        stri = '0';
      }else{
        stri = '';
      }
      document.getElementById('afterDate').innerHTML = afterDate.getHours()+':'+afterDate.getMinutes()+stri;
      document.getElementById('afterDate').setAttribute('value', nextDate.getHours()+':'+nextDate.getMinutes()+stri);

      d2.setMinutes(d2.getMinutes() + 30);
      after2Date = d2;
      console.log(after2Date);
      if(d2.getMinutes() < 10){
        stri = '0';
      }else{
        stri = '';
      }
      document.getElementById('after2Date').innerHTML = after2Date.getHours()+':'+after2Date.getMinutes()+stri;
      document.getElementById('after2Date').setAttribute('value', nextDate.getHours()+':'+nextDate.getMinutes()+stri);

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
      document.getElementById('nextDate').innerHTML = nextDate.getHours()+':'+nextDate.getMinutes()+stri;
      document.getElementById('nextDate').setAttribute('value', nextDate.getHours()+':'+nextDate.getMinutes()+stri);

      d2.setMinutes(d2.getMinutes() + 30);
      afterDate = d2;
      console.log(afterDate);
      if(d2.getMinutes() < 10){
        stri = '0';
      }else{
        stri = '';
      }
      document.getElementById('afterDate').innerHTML = afterDate.getHours()+':'+afterDate.getMinutes()+stri;
      document.getElementById('afterDate').setAttribute('value', nextDate.getHours()+':'+nextDate.getMinutes()+stri);

      d2.setMinutes(d2.getMinutes() + 30);
      after2Date = d2;
      console.log(after2Date);
      if(d2.getMinutes() < 10){
        stri = '0';
      }else{
        stri = '';
      }
      document.getElementById('after2Date').innerHTML = after2Date.getHours()+':'+after2Date.getMinutes()+stri;
      document.getElementById('after2Date').setAttribute('value', nextDate.getHours()+':'+nextDate.getMinutes()+stri);

    }

  </script>