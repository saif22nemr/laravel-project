@extends('layout.app')
@section('title')
Posts
@endsection
@section('content')

{!! Form::open(['method'=>'PUT','action'=>['PostsController@update',$post->id]]) !!}

<!-- <form class="form-control" method="post" action="{{ route('posts.store') }}"> -->
	{!! Form::label('classOfLabel','Title') !!}
	{!! Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Enter title!']) !!}
    <br>
    {!! Form::label('classOfLabel','Content') !!}
	{!! Form::text('body',$post->body,['class'=>'form-control','placeholder'=>'Enter body!']) !!}

    <br>
    <!-- <input name="_token" type="hidden" value="{{ csrf_token() }}"/> -->
    {!! Form::submit('Update Post',['class'=>'btn btn-primary','name'=>'updatePost']) !!}
    <!-- <input type="submit" name="submit"> -->
<!-- </form> -->
{!! Form::close() !!}

@endsection
