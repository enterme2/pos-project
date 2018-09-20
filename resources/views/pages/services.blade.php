@extends('layouts.app')
@section('content')

    <h1>{{$title}}</h1>
    <p>This is the laravel application services</p>
    <p>{{$content}}</p>
    @if(count($services)>0)
        <ul>
            @foreach($services as $service)
                <li>{{$service}}</li>
            @endforeach
        </ul>
    @endif

@endsection
