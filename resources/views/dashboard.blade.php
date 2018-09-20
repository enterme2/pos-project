@extends('layouts.app')

@section('content')
<div class="container">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        You are logged in!
    
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    
    <div class="jumbotron">
        <h1>Dashboard</h1>


            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        <h3>Your Blog Posts</h3>

        @if(count($posts)>0)

        <table class="table table-striped">
            <tr>
                <th>Title</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                <td>
                    {!!Form::open(['action'=>['PostsController@destroy', $post->id],'method'=>'POST','class'=>'float-left'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                    {!!Form::close()!!}
                </td>
            </tr>
            @endforeach
            
        </table>
        @else
            <p>You have no posts.</p>
        @endif
        
        


    </div>

</div>
@endsection
