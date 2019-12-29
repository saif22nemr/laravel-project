@extends('layout/app')
@section('title')
    Post
@stop

@section('content')
    <div class="container">
		<div class="subject">
			<div class="title">Get data from database table posts</div>
			<div class="content">
                Geting data from database table posts:
                <ul>
                	@if(count($result))
                		@foreach($result as $row)
                			<li>
                				<ul>
                				@foreach($row as $key=>$value)
                					<li>{{$key}} = {{$value}}</li>
                				@endforeach
                				</ul>
                				<br>
                			</li>
                		@endforeach
                	@endif
                </ul>
			</div>
		</div>
	</div>
@stop