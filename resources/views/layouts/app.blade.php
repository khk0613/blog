<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8" >
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <!-- <link rel="stylesheet" href="{{ URL::asset('css/common.css') }}"> -->
    	<!-- 기본적인 css  -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <!-- 부가적인 테마 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

        <link rel="stylesheet" href="{{ URL::asset('css/common.css') }}">
    
        <!-- jquery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

        <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="{{ URL::asset('js/common.js') }}"></script>
    </head>
    <body>
      <div class="container" style="margin-top:200px;">
        @yield('content')
      </div>
    </body>
</html>
