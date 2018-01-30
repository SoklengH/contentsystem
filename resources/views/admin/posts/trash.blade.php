@extends('layouts.app')



@section('content')

    <div class="panel panel-default">
    	<div class="panel-body">
			    <table class="table table-hover">
			    	<thead>
			    		<th>
			    			 Image
			    		</th>
			    		<th>
			    			Title	
			    		</th>
			    		<th>
			    			Edit
			    		</th>
			    		<th>
			    			Restore
			    		</th>
			    		<th>
			    			Destroy
			    		</th>
			    	</thead>
			    	<tbody>
			    		@if($posts->count() > 0)
				    		@foreach($posts as $post)

				    		 	<tr>
				    		 		<td><img src="{{ $post->featured }}" alt="{{ $post->title }}" height="50px" width="50px"></td>
				    		 		<td>{{ $post->title }}</td>
				    		 		<td>Edit</td>
				    		 		<td><a href="{{ route('post.restore', ['id'=> $post->id]) }}" class="btn btn-success btn-xs">Restore</a></td>
				    		 		<td><a href="{{ route('post.permanent', ['id'=> $post->id]) }}" class="btn btn-danger btn-xs">Delete</a></td>
				    		 	</tr>

				    		@endforeach

				    	@else

				    		<tr>
				    			<th colspan="5" class="text-center">
				    					No Trashed Post
				    			</th>
				    		</tr>

				    	@endif
			    	</tbody>
			    </table>
    	</div>
    </div>

@stop