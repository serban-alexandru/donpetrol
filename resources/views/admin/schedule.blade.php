@extends('layouts.admin')

@section('content')
    <div class="alert" style="background-color: black; color: white;">
        <h1>Openingstijden</h1>
    </div>
    <div class="table-responsive">
        <table class="table" style="text-align: center">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Naam van de dag</th>
                <th scope="col">Opening</th>
                <th scope="col">Sluitend</th>
                <th scope="col">Opties</th>
                </tr>
            </thead>
            <tbody
                @foreach($weekdays as $key=>$day)
                <tr>
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$day->name}}</td>
                    <td>{{$day->hour_start < 10 ? '0'.$day->hour_start : $day->hour_start}}:{{$day->minutes_start < 10 ? '0'.$day->minutes_start : $day->minutes_start}}</td>
                    <td>{{$day->hour_end < 10 ? '0'.$day->hour_end : $day->hour_end}}:{{$day->minutes_end < 10 ? '0'.$day->minutes_end : $day->minutes_end}}</td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit{{$day->id}}"><i class="fas fa-edit"></i></button>

                        <!-- Modal -->
                        <div class="modal fade" id="edit{{$day->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Verandering dag</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ url('/edit_date/'.$day->id) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group row">
                                    <tag-random style="padding-top: 8px" class="col-md-6 col-sm-6 col-xs-6 text-right">Starttijd</tag-random><input value="{{$day->hour_start < 10 ? '0'.$day->hour_start : $day->hour_start}}" name="hour_start" style="font-size: 20px;" required placeholder="--" min="00" max="23" type="number" class="form-control col-md-3">
                                </div>
                                <div class="form-group row">
                                    <tag-random style="padding-top: 8px" class="col-md-6 col-sm-6 col-xs-6 text-right">Notulen opening</tag-random> <input value="{{$day->minutes_start < 10 ? '0'.$day->minutes_start : $day->minutes_start}}" name="minutes_start" style="font-size: 20px;" required placeholder="--" min="00" max="59" type="number" class="form-control col-md-3">
                                </div>
                                <div class="form-group row">
                                    <!-- <label>Sluitingstijd</label> -->
                                    <tag-random style="padding-top: 8px" class="col-md-6 col-sm-6 col-xs-6 text-right">Sluitingstijd</tag-random> <input value="{{$day->hour_end < 10 ? '0'.$day->hour_end : $day->hour_end}}" name="hour_end" style="font-size: 20px;" required placeholder="--" min="00" max="23" type="number" class="form-control col-md-3">
                                </div>
                                <div class="form-group row">
                                    <tag-random style="padding-top: 8px" class="col-md-6 col-sm-6 col-xs-6 text-right">Notulen sluiten</tag-random> <input value="{{$day->minutes_end < 10 ? '0'.$day->minutes_end : $day->minutes_end}}" name="minutes_end" style="font-size: 20px;" required placeholder="--"  min="00" max="59" type="number" class="form-control col-md-3">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                                <button type="submit" class="btn btn-primary">Verander</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection