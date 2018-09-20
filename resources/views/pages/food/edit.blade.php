@extends('layouts.app')
@section('content')
	<a href="/food" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>

	{!!Form::open(['action'=>['FoodController@destroy', $food->id],'method'=>'POST'])!!}
		{{Form::hidden('_method','DELETE')}}
		<button type="submit" class="btn btn-danger float-right"><i class="fas fa-trash"></i></button>
	{!!Form::close()!!}

	<h1>Edit Food</h1>
	
	{!! Form::open(['action' => ['FoodController@update', $food->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}


		<div class="form-group">
			{{Form::label('foodname','Food Name')}}
			{{Form::text('foodname',$food->foodname,['class'=>'form-control','placeholder'=>'Enter Food Name'])}}

			{{Form::label('description','Description')}}
			{{Form::textarea('description',$food->description,['class'=>'form-control','placeholder'=>'Enter Food Description'])}}

			{{Form::label('price','Price')}}
			{{Form::number('price',$food->price,['class'=>'form-control','placeholder'=>'Enter Food Price','step'=>'0.01'])}}
		</div>
		<div class="form-group">
			{{Form::file('food_image')}}
		</div>

		{{Form::hidden('_method','PUT')}}
    	{{Form::submit('Save',['class'=>'btn btn-primary'])}}
	{!! Form::close() !!}






@endsection
