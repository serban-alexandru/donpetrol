@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="alert" style="background-color: black; color: white;">
            <h1>Category - {{$category->name}}</h1>
        </div>
        <div class="table-responsive">
            <table class="table" style="text-align: center">
                <thead> 
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Products</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($category->subcategories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->products->count()}}</td>
                        <td style="max-width: 300px; width: 300px">
                            <a href="{{ url('/category/'.$category->id) }}">
                                <button class="btn btn-success" style="padding-top: 9px; padding-bottom: 9px">
                                    <i class="fas fa-eye" style="font-size: 20px"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                    <!-- Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-warning">Save changes</button>
                        </div>
                        </div>
                    </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </tbody>
            </table>

        </div>

        <!-- <button class="btn btn-success" data-toggle="modal" data-target="#addModal">Add categories</button> -->

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Create</button>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection