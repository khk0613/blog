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
			<div class="panel-heading">{{ $comment->name }}</div>
			<div class="panel-body">{{ $comment->content }}</div>
			<a style="text-align:right;" class="btn btn-default" href="">수정하기</a>
			<a style="text-align:right;" id="delete" class="btn btn-default" href="#none">삭제하기</a>
			
		@endforeach
	</div>
</div>


	

	<form action="" method="POST" id="deleteform">
		<a data-id="{{$post->id}}" class="button_delete btn btn-default" href="{{url('posts/' . $post->id . '/delete')}}">삭제</a>
		<!-- <input type="password" name="password" class="form-control" placeholder="비밀번호를 입력해주세요" aria-describedby="basic-addon1"> -->
	</form>
		<a class="btn btn-default" href="{{url('posts/'.$post->id.'/edit')}}">수정</a>
		<a class="btn btn-default" href="{{url('/posts')}}">목록</a>


	

		
	

	





@endsection
