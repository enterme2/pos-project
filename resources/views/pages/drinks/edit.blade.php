@extends('layouts.app')
@section('content')
	<a href="/drinks" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
	
	{!!Form::open(['action'=>['DrinksController@destroy', $drinks->id],'method'=>'POST'])!!}
		{{Form::hidden('_method','DELETE')}}
		<button type="submit" class="btn btn-danger float-right"><i class="fas fa-trash"></i></button>
	{!!Form::close()!!}	<h1>Edit Drinks Item</h1>

	
	{!! Form::open(['action' => ['DrinksController@update', $drinks->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}


		<div class="form-group">
			{{Form::label('drinksname','Drinks Name')}}
			{{Form::text('drinksname',$drinks->drinksname,['class'=>'form-control','placeholder'=>'Enter Drinks Name'])}}

			{{Form::label('description','Description')}}
			{{Form::textarea('description',$drinks->description,['class'=>'form-control','placeholder'=>'Enter Drinks Description'])}}

			{{Form::label('price','Price')}}
			{{Form::number('price',$drinks->price,['class'=>'form-control','placeholder'=>'Enter Drinks Price','step'=>'0.01'])}}
		</div>
		<div class="form-group">
			{{Form::file('drinks_image')}}
		</div>

		{{Form::hidden('_method','PUT')}}
    	{{Form::submit('Save',['class'=>'btn btn-primary'])}}

	{!! Form::close() !!}

@endsection
