@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
    	<div class="panel-body">
			    <table class="table table-hover">
			    	<thead>
			    		<th>
			    			Tags name
			    		</th>
			    		<th>
			    			Editing	
			    		</th>
			    		<th>
			    			Deleting
			    		</th>
			    	</thead>
			    	<tbody>
			    		@foreach($tags as $tag)
			    		 	<tr>
			    		 		<td>
			    		 			{{ $tag->tag }}
			    		 		</td>
			    		 		<td>
			    		 			<a href="{{ route('tag.edit', ['id' => $tag->id]	) }}" class="btn btn-xs btn-info">
			    		 				{{-- <span class="glypyicon glyphicon-pancil"></span> --}}
			    		 				Edit
			    		 			</a>
			    		 		</td>
			    		 		<td>
			    		 			<a href="{{ route('tag.delete', ['id' => $tag->id]) }}" class="btn btn-xs btn-danger">
			    		 				{{-- <span class="glypyicon glyphicon-trash"></span> --}}

			    		 				Delete
			    		 			</a>
			    		 		</td>
			    		 	</tr>
			    		@endforeach
			    	</tbody>
			    </table>
    	</div>
    </div>
@stop