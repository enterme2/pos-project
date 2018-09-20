@extends('layouts.app')
@section('content')
	<a href="/home" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
	<h1>Food List <a href="/food/create" class="btn btn-primary">+</a> </h1>

	@if(count($food)>0)
		<table class="table table-sm table-striped">
			<thead class="thead-dark">
			    <tr>
			      <th scope="col">Name</th>
			      <th scope="col">Description</th>
			      <th scope="col">Price (RM)</th>
			      <th></th>
			    </tr>
			 </thead>
			 <tbody>
		@foreach($food as $foods)
				<tr>
					<td><img src="/storage/food_images/{{$foods->food_image}}" style="width: 75px;height: 75px"></td>
					<td>{{ $foods->foodname }}</td>
					<td>{{$foods->price}}</td>
					<td><a href="/food/{{$foods->id}}/edit/" class="btn btn-primary btn-sm">Edit</a></td>
				</tr>
		@endforeach
			</tbody>
		</table>
		<!-- paginaton -->
		{{$food->links()}}

	@else
		<p>No Food found !</p>
	@endif
@endsection
