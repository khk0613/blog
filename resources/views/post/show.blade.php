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


<div class="input-group" style="margin:100px 0;">
	<div>댓글</div>
	<form action="{{ url('posts/' . $post->id . '/comments') }}" method="post">
		{{ csrf_field() }}
		<div class="input-group">
			<input class="form-control" type="text" name="name" placeholder="이름">
		</div>
		<div class="input-group">
			<input class="form-control" name="content" placeholder="comment를 입력해주세요">
		</div>	
		<div class="input-group">
			<input class="form-control" type="password" name="password" placeholder="패스워드를 입력해주세요">
		</div>
		<button>댓글등록</button>
	</form>
</div>
<div>
	<div class="panel panel-primary">
		@foreach ($post->comments as $comment)
			<div class="panel-heading">{{ $comment->name }}</div>
			<div class="panel-body">{{ $comment->content }}</div>
			<a style="text-align:right;" class="btn btn-default" href="">수정하기</a>
			<a style="text-align:right;" class="btn btn-default" href="">삭제하기</a>
		@endforeach
	</div>
</div>


	


	<a class="btn btn-default" href="{{url('posts/'.$post->id.'/edit')}}">수정</a>
	<a class="btn btn-default" href="{{url('/posts/'.$post->id.'/delete')}}">삭제</a>
	<a class="btn btn-default" href="{{url('/posts')}}">목록</a>

	
	
		
	

	





@endsection