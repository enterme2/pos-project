@extends('layouts.app')
@section('content')
	<a href="/drinks" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
	<h1>Add Drinks Item</h1>
	
	{!! Form::open(['action' => 'DrinksController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}

		<div class="form-group">
			{{Form::label('drinksname','Drinks Name')}}
			{{Form::text('drinksname','',['class'=>'form-control','placeholder'=>'Enter Drinks Name'])}}

			{{Form::label('description','Description')}}
			{{Form::textarea('description','',['class'=>'form-control','placeholder'=>'Enter Drinks Description'])}}

			{{Form::label('price','Price')}}
			{{Form::number('price','',['class'=>'form-control','placeholder'=>'Enter Drinks Price','step'=>'0.01'])}}
		</div>
		<div class="form-group">
			{{Form::file('drinks_image')}}
		</div>
    	{{Form::submit('Add Item',['class'=>'btn btn-primary'])}}

	{!! Form::close() !!}

@endsection
