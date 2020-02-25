@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="alert" style="background-color: black; color: white;">
            <h1>Orders</h1>
        </div>

        <div id="accordion">
            <div class="buttons">
                <button class="btn btn-warning" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                Burgers
                </button>
                <button class="btn btn-warning" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                Snacks
                </button>
                <button class="btn btn-warning" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                Drinks
                </button>
            </div>
            <style>
            form #input-wrap {
            margin: 0px;
            padding: 0px;
            }

            input#number {
            text-align: center;
            border: none;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            margin: 0px;
            width: 40px;
            height: 40px;
            }
            input#number2 {
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
            function increaseValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('number').value = value;
            }

            function decreaseValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            document.getElementById('number').value = value;
            }
            function increaseValue2() {
            var value = parseInt(document.getElementById('number2').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('number2').value = value;
            }

            function decreaseValue2() {
            var value = parseInt(document.getElementById('number2').value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            document.getElementById('number2').value = value;
            }
            </script>
            <div style="margin-top: 20px">
                <div class="card" style="margin: 0px">
                    <div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                                <div class="card" style="background: black">
                                    <div class="card-header" style="font-size: 30px;color: white; padding: 20px">
                                        <i class="fab fa-product-hunt" style="font-size: 60px;"></i><br><br>
                                        Product name
                                        <form style="margin-top: 10px">
                                        <button style="margin-top: 1px" type="button" class="btn btn-warning" id="decrease" onclick="decreaseValue()">+</button>
                                        <input type="number" id="number" value="0" />
                                        <button style="margin-top: 1px" type="button" class="btn btn-warning" id="increase" onclick="increaseValue()">+</button>
                                        <br>
                                        <button class="btn btn-warning">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                                <div class="card" style="background: black">
                                    <div class="card-header" style="font-size: 30px;color: white; padding: 20px">
                                        <i class="fab fa-product-hunt" style="font-size: 60px;"></i><br><br>
                                        Product name
                                        <form style="margin-top: 10px">
                                        <button style="margin-top: 1px" type="button" class="btn btn-warning" id="decrease" onclick="decreaseValue2()">+</button>
                                        <input type="number" id="number2" value="0" />
                                        <button style="margin-top: 1px" type="button" class="btn btn-warning" id="increase" onclick="increaseValue2()">+</button>
                                        <br>
                                        <button class="btn btn-warning">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
                <div class="card" style="margin: 0px">
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
                </div>
            </div>
        </div> 

    </div>
@endsection