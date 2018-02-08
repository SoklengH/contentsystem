@extends('layouts.app', ['active'=>'type'])
@section('content')
    <div class="addnewitem">
        <a href="{{ route('type.create') }}">
            <button type="button" class="btn btn-success" style="height: 40px; background-color: blue; color: white;">Add New CategoryType</button>
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
                                <th>Category Types</th>
                                <th>Editing</th>
                                <th>Deleting</th>
                                </thead>
                                <tbody>
                                @foreach($types as $type)
                                    <tr>
                                        <td>{{ $type->type }}</td>
                                        <td><a href="{{ route('type.edit', ['id' => $type->id]  ) }}" class="btn btn-xs btn-info">Edit</a></td>
                                        <td><a href="{{ route('type.delete', ['id' => $type->id]) }}" class="btn btn-xs btn-danger">Delete</a></td>
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
