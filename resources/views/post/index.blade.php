@extends('layouts.app')
@section('content')
	

	<div style="">
		@if ($total_posts_count == 0)
			...
		@else
			<p>총 {{ $total_posts_count }} 개의 글이 있습니다.</p>
			<ul class="list-group">
				@foreach($posts as $post)
					<li class="list-group-item">
						<a href="{{url('posts/'. $post->id)}}">{{$post->title}}</a>
						<p>{{$post->created_at->format('Y.m.d')}}</p>
					</li>
				@endforeach
			</ul>
		@endif
		</div>
	<a href="{{ url('posts/create')}}">등록하기</a>


@endsection
