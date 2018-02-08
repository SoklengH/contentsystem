@extends('layouts.app', ['active' => 'product'])
@section('content')
    <div class="addnewitem">
        <a href="{{ route('post.create') }}">
            <button type="button" class="btn btn-success" style="height: 40px; background-color: blue; color: white;">Add New Product</button>
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
                                <th>Images</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Descriptions</th>
                                <th>Edit</th>
                                <th>Trash</th>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td><img src="{{ $post->featured }}" alt="" width="50px" height="50px"></td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->price }}</td>
                                        <td>{{ $post->content }}</td>
                                        <td><a href="{{ route('post.edit', ['id' => $post->id]	) }}" class="btn btn-xs btn-info">Edit</a>
                                        </td>
                                        <td><a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-xs btn-danger">Trash</a></td>
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