@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="alert" style="background-color: black; color: white;">
            <h1>Products</h1>
        </div>
        <div class="table-responsive">
            <table class="table" style="text-align: center">
                <thead> 
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}$</td>
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
                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('/edit_product/'.$product->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" value="{{$product->name}}" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Price:</label>
                                <input type="number" step="0.1" value="{{$product->price}}" name="price" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Table part:</label>
                                <input type="text" name="table_part" value="{{$product->table_part}}" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Table number:</label>
                                <input type="text" name="table_number" value="{{$product->table_number}}" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Category:</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="" hidden>Choose</option>
                                    @foreach($categories as $category)
                                        <option @if($product->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Save changes</button>
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
                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this product?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="{{ url('/delete_product/'.$product->id) }}">
                                <button type="button" class="btn btn-danger">Delete</button>
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

        <button class="btn btn-success" data-toggle="modal" data-target="#addModal">Add products</button>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/add_product') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Price:</label>
                    <input type="number" step="0.1" name="price" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Table part:</label>
                    <input type="text" name="table_part" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Table number:</label>
                    <input type="text" name="table_number" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Category:</label>
                    <select name="category_id" class="form-control" required>
                        <option value="" hidden>Choose</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Add product</button>
            </div>
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection