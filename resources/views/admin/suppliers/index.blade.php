@extends('layouts.app',['active'=>'supplier'])
@section('content')
    <div class="addnewitem">
        <a href="{{ route('supplier.create') }}">
            <button type="button" class="btn btn-success" style="height: 40px; background-color: blue; color: white;">Add New Supplier</button>
        </a>
    </div>
    <div class="wrapper">
        <div class="content-body" style="width: 100%" id="style-2">
            <div class="table-responsive">
                <table class="table">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <th>Supplier Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Editing</th>
                                <th>Deleting</th>
                                </thead>
                                <tbody>
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $supplier->name }}</td>
                                        <td><img src="{{ $supplier->featured }}" alt="" width="50px" height="50px"></td>
                                        <td>{{ $supplier->description }}</td>
                                        <td><a href="{{ route('supplier.edit', ['id' => $supplier->id]	) }}" class="btn btn-xs btn-info">Edit</a>
                                        </td>
                                        <td><a href="{{ route('supplier.delete', ['id' => $supplier->id]) }}" class="btn btn-xs btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
@endsection