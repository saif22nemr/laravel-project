@extends('layout.admin')

@section('title')
	Test Page
@endsection

@section('content')
	@include('layout.include.tinyEditor')
	<textarea class="form-control">some text here</textarea>
@endsection