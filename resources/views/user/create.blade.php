

@extends('layout.admin')
@section('phpCode')
	<?php
		$page = 'User';
	?>
@endsection
@section('title')
	Users
@endsection
@section('content')
	<div class="col-md-9">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Create User</strong> Form
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="name" placeholder="Name" class="form-control">
                                                    <small class="form-text text-muted">This is a help text</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="email-input" name="email" placeholder="Enter Email" class="form-control">
                                                    <small class="help-block form-text">Please enter your email</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="password-input" name="password" placeholder="Password" class="form-control">
                                                    <small class="help-block form-text">Please enter a complex password</small>
                                                </div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="submit" name="create-user" value="Create User" class="btn btn-primary form-control">
                                                </div>
                                            </div>       
                                            
                                        </form>
                                    </div>
                                    
                                </div>
                                
@endsection