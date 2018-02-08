@extends('layouts.app',['active'=>'event'])
@section('content')
    <div class="addnewitem">
        <a href="{{ route('event.create') }}">
            <button type="button" class="btn btn-success" style="height: 40px; background-color: blue; color: white;">Add New Event</button>
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
                                <th>Event Name</th>
                                <td>Image</td>
                                <th>Description</th>
                                <th>Editing</th>
                                <th>Deleting</th>
                                </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td>{{ $event->name }}</td>
                                        <td><img src="{{ $event->featured }}" alt="" width="50px" height="50px"></td>
                                        <td>{{ $event->description }}</td>
                                        <td><a href="{{ route('event.edit', ['id' => $event->id]	) }}" class="btn btn-xs btn-info">Edit</a></td>
                                        <td><a href="{{ route('event.delete', ['id' => $event->id]) }}" class="btn btn-xs btn-danger">Delete</a></td>
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