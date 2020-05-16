@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="alert" style="background-color: black; color: white;">
            <h1>@lang('all.categories')</h1>
        </div>
        <div class="table-responsive">
            <table class="table" style="text-align: center">
                <thead> 
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">@lang('all.name')</th>
                    <th scope="col">@lang('all.products')</th>
                    <th scope="col">@lang('all.categories')</th>
                    <th scope="col">@lang('all.actions')</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->products->count()}}</td>
                        <td>{{$category->subcategories->count()}}</td>
                        <td style="max-width: 300px; width: 300px">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#editCat{{$category->id}}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="editCat{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $category->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ url('/edit_category/'.$category->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>@lang('all.name'):</label>
                                        <input value="{{$category->name}}" type="text" required placeholder="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Icon:</label>
                                        <input value="{{$category->icon}}" type="text" required placeholder="icon" name="icon" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('all.description'):</label>
                                        <textarea name="description" cols="30" rows="10" placeholder="description" class="form-control">{{$category->description}}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" style="background: black">Save changes</button>
                                </div>
                                </form>
                                </div>
                            </div>
                            </div>
                            <a href="{{ url('/category/'.$category->id) }}">
                                <button class="btn btn-success" style="padding-top: 9px; padding-bottom: 9px">
                                    <i class="fas fa-eye" style="font-size: 20px"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$categories->links()}}

        </div>
    </div>
@endsection