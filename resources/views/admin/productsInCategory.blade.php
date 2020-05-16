@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="alert" style="background-color: black; color: white;">
            <h1>
            @if($category->category)
            {{$category->category->name}} - 
            @endif
            <i class="{{ $category->icon }}"></i> {{$category->name}}</h1>
            <h4>{{$category->description}}</h4>
        </div>
        <div class="table-responsive">
            <table class="table" style="text-align: center">
                <thead> 
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">@lang('all.name')</th>
                    <th scope="col">@lang('all.price')</th>
                    <th scope="col">@lang('all.actions')</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>€ {{$product->price}}</td>
                        <td style="max-width: 300px; width: 300px">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$product->id}}"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$product->id}}"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="editModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('all.modify_product')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('/edit_product/'.$product->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>@lang('all.name'):</label>
                                <input type="text" name="name" value="{{$product->name}}" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>@lang('all.description'):</label>
                                <textarea name="description" cols="30" rows="5" class="form-control">{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>@lang('all.price'):</label>
                                <input type="number" step="0.1" value="{{$product->price}}" name="price" required class="form-control">
                            </div>
                            <h3>@lang('all.pos_details')</h3>
                            <br>
                            <div class="form-group">
                                <label>Article id:</label>
                                <input type="text" name="article_id" required value="{{$product->article_id}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Article number:</label>
                                <input type="text" name="article_number" required value="{{$product->article_number}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Article name:</label>
                                <input type="text" name="article_name" required value="{{$product->article_name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Department id:</label>
                                <input type="text" name="department_id" required value="{{$product->department_id}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Department number:</label>
                                <input type="text" name="department_number" required value="{{$product->department_number}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Department name:</label>
                                <input type="text" name="department_name" required value="{{$product->department_name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Group name:</label>
                                <input type="text" name="group_name" required value="{{$product->group_name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Category name:</label>
                                <input type="text" name="category_name" required value="{{$product->category_name}}" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('all.close')</button>
                            <button type="submit" class="btn btn-warning">@lang('all.modify_product')</button>
                        </div>
                        </form>
                    </div>
                    </div>
                    </div>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('all.delete_product')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Bent u zeker dat u dit product wilt verwijderen?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                            <a href="{{ url('/delete_product/'.$product->id) }}">
                                <button type="button" class="btn btn-danger">Verwijderen</button>
                            </a>
                        </div>
                        </div>
                    </div>
                    </div>
                @endforeach
                </tbody>
            </table>
            {{$products->links()}}
        </div>

        <button class="btn btn-success" data-toggle="modal" data-target="#addModal">@lang('all.add_product')</button>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">@lang('all.add_product')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/add_product') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>@lang('all.name'):</label>
                    <input type="text" name="name" required class="form-control">
                </div>
                <div class="form-group">
                    <label>@lang('all.description'):</label>
                    <textarea name="description" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>@lang('all.price'):</label>
                    <input type="number" step="0.1" name="price" required class="form-control">
                </div>
                <h3>@lang('all.pos_details')</h3>
                <br>
                <div class="form-group">
                    <label>Article id:</label>
                    <input type="text" name="article_id" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Article number:</label>
                    <input type="text" name="article_number" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Article name:</label>
                    <input type="text" name="article_name" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Department id:</label>
                    <input type="text" name="department_id" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Department number:</label>
                    <input type="text" name="department_number" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Department name:</label>
                    <input type="text" name="department_name" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Group name:</label>
                    <input type="text" name="group_name" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Category name:</label>
                    <input type="text" name="category_name" required class="form-control">
                </div>
                <input type="text" hidden name="category_id" value="{{$category->id}}" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('all.close')</button>
                <button type="submit" class="btn btn-success">@lang('all.add_product')</button>
            </div>
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection