@extends('layout.app')
@section('title')
Posts
@endsection
@section('content')


{!! Form::open(['method'=>'post','action'=>'PostsController@store','files'=>true]) !!}

<!-- <form class="form-control" method="post" action="{{ route('posts.store') }}"> -->
	{!! Form::label('classOfLabel','Title') !!}
	{!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Enter title!']) !!}
    <!-- <input type="text" name="title" placeholder="Enter title" > -->
    <br>
    {!! Form::label('classOfLabel','Content') !!}
	{!! Form::text('body',null,['class'=>'form-control','placeholder'=>'Enter body!']) !!}
    <!-- <input type="text" name="body" placeholder="Enter body"> -->
    <br>
    {!! Form::file('file',['class'=>'form-control']) !!}
    <br>
    <!-- <input name="_token" type="hidden" value="{{ csrf_token() }}"/> -->
    {!! Form::submit('Create Post',['class'=>'btn btn-primary','name'=>'createPost']) !!}
    <!-- <input type="submit" name="submit"> -->
<!-- </form> -->
{!! Form::close() !!}

	@if($errors->any())
		<h2>Error in form: </h2>
		<ul>
			@foreach($errors->all() as $err)
				<li>{{$err}}</li>
			@endforeach
		</ul>
	@endif

@endsection
