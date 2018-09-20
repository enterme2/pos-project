@extends('layouts.app')
@section('content')

<div class="jumbotron">
	<div class="text-center">
    <h1>{{$title}}</h1>
        <!--
    <p>This is the POS Laravel Application</p>
    <a href="/login" class="btn btn-primary">Login</a>
    <a href="/register" class="btn btn-success">Register</a>
	-->

	<div class="card-deck">
	  <div class="card bg-warning" onclick="window.location='/food'">
	    <div class="card-body text-center">
	      <p class="card-text"><i class="fas fa-utensils fa-7x"></i><br><b>FOOD LIST</b></p>
	    </div>
	  </div>
	  <div class="card bg-warning" onclick="window.location='/drinks'">
	    <div class="card-body text-center">
	      <p class="card-text"><i class="fas fa-coffee fa-7x"></i><br><b>DRINKS LIST</b></p>
	    </div>
	  </div>
	  <br>
	</div>

	<div class="card-deck" style="padding-top: 12px">
	  <div class="card bg-warning" onclick="window.location='/drinks'">
	    <div class="card-body text-center">
	      <p class="card-text"><i class="fas fa-coffee fa-7x"></i><br><b>TAKE ORDER</b></p>
	    </div>
	  </div>
	 </div>

	
		
	</div>

</div>

@endsection