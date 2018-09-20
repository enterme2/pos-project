@extends('layouts.app')
@section('content')
	<a href="/food" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
	<h1>Add Food Item</h1>
	
	{!! Form::open(['action' => 'FoodController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}

		<div class="form-group">
			{{Form::label('foodname','Food Name')}}
			{{Form::text('foodname','',['class'=>'form-control','placeholder'=>'Enter Food Name'])}}

			{{Form::label('description','Description')}}
			{{Form::textarea('description','',['class'=>'form-control','placeholder'=>'Enter Food Description'])}}

			{{Form::label('price','Price')}}
			{{Form::number('price','',['class'=>'form-control','placeholder'=>'Enter Food Price','step'=>'0.01'])}}
		</div>
		<div class="form-group">
			{{Form::file('food_image')}}
		</div>
    	{{Form::submit('Add Item',['class'=>'btn btn-primary'])}}

	{!! Form::close() !!}

@endsection
