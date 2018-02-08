@extends('layouts.app', ['active' => 'category'])
@section('content')
    <div class="addnewitem">
        <a href="{{ route('category.create') }}">
            <button type="button" class="btn btn-success" style="height: 40px; background-color: blue; color: white;">Add New Category</button>
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
                                <th>Category Name</th>
                                <td>Image</td>
                                <th>Type</th>
                                <th>Editing</th>
                                <th>Deleting</th>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td><img src="{{ $category->featured }}" alt="" width="50px" height="50px"></td>
                                        <td>{{ $category->categorytype['type'] }}</td>
                                        <td><a href="{{ route('category.edit', ['id' => $category->id]  ) }}" class="btn btn-xs btn-info">Edit</a></td>
                                        <td><a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-xs btn-danger">Delete</a></td>
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