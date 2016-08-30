@extends('layouts.app')


@section('content')
<div>
	<form action="{{url('posts')}}" method="post">
		{{csrf_field()}}
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">제목</span>
			<input type="text" name="title" class="form-control" placeholder="제목을 입력해주세요" aria-describedby="basic-addon1">
			@if($errors->has('title'))
				<p class="alert_custom">{{$errors->first('title')}}</p>
			@endif
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">내용</span>
			<textarea name="content" class="form-control col-sm-10" rows="10" placeholder="내용을 입력해주세요"></textarea>	@if($errors->has('content'))
				<p class="alert_custom">{{$errors->first('content')}}</p>
			@endif	
		</div>
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">비밀번호</span>
			<input type="password" name="password" class="form-control" placeholder="비밀번호를 입력해주세요" aria-describedby="basic-addon1">
			@if($errors->has('password'))
				<p class="alert_custom">{{$errors->first('password')}}</p>
			@endif
		</div>
		<div style="text-align:right;">
			<button type="submit" class="btn btn-default">save</button>
			<a class="btn btn-default" href="{{ url('posts') }}">cancel</a>
		</div>		
	</form>
</div>
@endsection