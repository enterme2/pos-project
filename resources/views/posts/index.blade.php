@extends('layouts.app')
@section('content')
	<h1>Post <a href="/posts/create" class="btn btn-primary">+</a></h1> 
	@if(count($posts)>0)
		@foreach($posts as $post)
			<div class="card">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<img class="img-thumbnail img-fluid" style="width: 100px; height: 100px"  src="/storage/cover_images/{{$post->cover_image}}">
					</div>
					<div class="col-md-8 col-sm-8">
						<h3><a href="/posts/{{$post->id}}"> {{ $post->title }} </a></h3> 
						<small>Written on {{$post->created_at}} by {{$post->user->name}} </small>
					</div>
					
				</div>
			</div>
		@endforeach

		<!-- paginaton -->
		{{$posts->links()}}

	@else
		<p>No posts found !</p>
	@endif
@endsection
