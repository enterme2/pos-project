@extends('layouts.app')
@section('content')
	<a href="/home" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
	<h1>Drinks List <a href="/drinks/create" class="btn btn-primary">+</a> </h1>

	@if(count($drinks)>0)
		<table class="table table-sm">
			<thead class="thead-dark">
			    <tr>
			      <th scope="col">Name</th>
			      <th scope="col">Description</th>
			      <th scope="col">Price (RM)</th>
			      <th></th>
			    </tr>
			 </thead>
			 <tbody>
		@foreach($drinks as $drink)
				<tr>
					<td><img src="/storage/drinks_images/{{$drink->drinks_image}}" style="width: 75px;height: 75px"></td>
					<td>{{ $drink->drinksname }}</td>
					<td>{{$drink->price}}</td>
					<td><a href="/drinks/{{$drink->id}}/edit/" class="btn btn-primary btn-sm">Edit</a></td>
				</tr>
		@endforeach
			</tbody>
		</table>
		<!-- paginaton -->
		{{$drinks->links()}}

	@else
		<p>No Drinks found !</p>
	@endif
@endsection
