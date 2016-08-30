@extends('layouts.app')

@section('content')
<div class="input-group">
	<form action="{{ url('posts/'.$post->id) }}" method="POST">
		{{ method_field('DELETE') }}
		{{ csrf_field() }}
		<span>비밀번호를 입력해주세요</span>
		<input type="password" name="password" class="form-control" placeholder="비밀번호를 입력해주세요" aria-describedby="basic-addon1">
		<button>삭제</button>
	</form>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
    		<ul>
        		@foreach ($errors->all() as $error)
            		<li>{{ $error }}</li>
        		@endforeach
    		</ul>
		</div>
	@endif
</div>




@endsection