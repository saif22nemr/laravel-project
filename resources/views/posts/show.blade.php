@extends('layout.app')


@section('title')
	Post
@endsection
@section('content')
	<div class="alert alert-success center test">Home</div>
	<div class="container">
		<div class="subject">
			<div class="title">Show Posts</div>
			<div class="content">
				<a href="{{route('posts.create')}}" class="center"><h3>Create Post</h3></a>
				<h2>Posts :</h2>
				<ul>
					@if(count($posts))
						@foreach($posts as $post)
							<li>Row : <br>
								<a href="{{route('posts.edit',$post->id)}}">ID : {{$post->id}}</a><br>
								Title : {{$post->title}}<br>
								Body : {{$post->body}}<br>
                                                                                                                                @if(array_key_exists($post->id,$images))
                                                                                                                                    @if(count($images[$post->id])>0)
                                                                                                                                        @foreach($images[$post->id] as $img)
                                                                                                                                        <a href="{{route('post.show.image',$img)}}">Image</a>
                                                                                                                                        @endforeach
                                                                                                                                     @endif
                                                                                                                                @endif
								<!-- <form method="post" action="{{ route('posts.destroy',$post->id)}}"> -->
									{!! Form::open(['method'=>'DELETE','action'=>['PostsController@destroy',$post->id]]) !!}
									<input type="submit" name="submit1" value="Delete">
									<!-- <input name="_token" type="hidden" value="{{ csrf_token() }}"/> -->
								<!-- </form> -->
								{!! Form::close() !!}
							</li>
						@endforeach
					@else
						<h2 class="center">There no post!</h2>
					@endif

				</ul>
			</div>
		</div>
	</div>
@endsection