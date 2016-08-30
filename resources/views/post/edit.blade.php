@extends('layouts.app')

@section('content')
<div class="input-group">
	<form action="{{url('posts/'.$post->id)}}" method="post">
		{{csrf_field()}}
		{{ method_field('put') }}
		@if (count($errors) > 0)
			<div class="alert alert-danger">
        		<ul>
            		@foreach ($errors->all() as $error)
                		<li>{{ $error }}</li>
            		@endforeach
        		</ul>
    		</div>
			@endif
		<div>
			<span>{{$post -> id}}</span>
		</div>
		<div>
			제목 :
			<input type="text" name="title" value="{{$post->title}}">
		</div>
		<div>
			내용 :
			<input type="text" name="content" value="{{$post->content}}">
		</div>
		<div>
			<button type="submit">저장하기</button>
			<a href="{{ url('posts/'.$post->id) }}">취소</a>
		</div>		
	</form>

</div>
@endsection
