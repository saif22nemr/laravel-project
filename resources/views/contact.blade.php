@extends('layout.app')

@section('title')
	Contact
@stop
<?php
//comment
?>
@section('content')
	<div class="container">
		<div class="subject">
			<div class="title">get array from controller</div>
			<div class="content">
				<span>this id from url : {{$id ?? ''}}</span>
				<h2>People Arrary:</h2>
				<ul>
					@if(count($people))
						@foreach($people as $person)
							<li>{{$person}}</li>
						@endforeach
					@endif
				</ul>
			</div>
		</div>
	</div>
@stop