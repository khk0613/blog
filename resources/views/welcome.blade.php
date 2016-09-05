@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    로그인 해주세요
                </div>


<div>
    <ul>
    @foreach($posts as $post)
        <li class="list-group-item">
            <a href="{{url('posts/'. $post->id)}}">{{$post->title}}</a>
            <p>{{$post->created_at->format('Y.m.d')}}</p>
        </li>
    @endforeach
    </ul>
</div>

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
            <textarea name="content" class="form-control col-sm-10" rows="10" placeholder="내용을 입력해주세요"></textarea>  @if($errors->has('content'))
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
            <button type="submit" class="btn btn-default">저장하기</button>
            <a class="btn btn-default" href="{{ url('posts') }}">취소</a>
        </div>      
    </form>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
