@extends('layouts.app')

@section('content')

@if ($notice)
	<div id="notice-message">{{ $notice }}</div>
@endif

<div class="input-group">
	<span class="input-group-addon" id="basic-addon1">번호</span>
	<input class="form-control" type="text" value="{{$post -> id}}" readonly="readonly">
</div>
<div class="input-group">
	<span class="input-group-addon" id="basic-addon1">제목</span>
	<input class="form-control" type="text" value="{{$post -> title}}" readonly="readonly">
</div>	
<div class="input-group">
	<span class="input-group-addon" id="basic-addon1">내용</span>
	<input class="form-control" type="text" value="{{$post -> content}}" readonly="readonly">
</div>	


<div class="input-group" style="margin:100px 0; width:100%;">
	<div>댓글</div>
	<form action="{{ url('posts/' . $post->id . '/comments') }}" method="post">
		{{ csrf_field() }}
		<div class="input-group">
			<input class="form-control" type="text" name="name" placeholder="이름">
			@if($errors->has('name'))
				<p class="alert_custom">{{$errors->first('name')}}</p>
			@endif
		</div>
		<div class="input-group">
			<input class="form-control" name="content" placeholder="comment를 입력해주세요">
			@if($errors->has('content'))
				<p class="alert_custom">{{$errors->first('content')}}</p>
			@endif
		</div>	
		<div class="input-group">
			<input class="form-control" type="password" name="password" placeholder="패스워드를 입력해주세요">
			@if($errors->has('password'))
				<p class="alert_custom">{{$errors->first('password')}}</p>
			@endif
		</div>
		<button>댓글등록</button>
	</form>
</div>
<div>
	<div class="panel panel-primary">
		@foreach ($post->comments as $comment)
			<form id="comment-delete-form" action="{{url('posts/' . $post->id . '/comments/' . $comment->id)}}" method="POST">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<div class="panel-heading">{{ $comment->name }}</div>
				<div class="panel-body">{{ $comment->content }}</div>
				<a style="text-align:right;" class="btn btn-default" href="">수정하기</a>
				<button style="text-align:right;" id="comment_delete">삭제하기</a></button>
			</form>

		@endforeach
	</div>
</div>


	

		<form id="post-delete-form" action="{{url('posts/' .$post->id )}}" method="POST">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}
			<a data-id="{{$post->id}}" id="post_delete" class="btn btn-default" href="#none">삭제</a>
			<a class="btn btn-default" href="#none">수정</a>
			<a class="btn btn-default" href="{{url('/posts')}}">목록</a>
		</form>


	

		
	

	





@endsection
