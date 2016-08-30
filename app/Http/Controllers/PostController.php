<?php

namespace App\Http\Controllers;
//use Hash;

use Crypt;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class PostController extends Controller
{
    function index()
    {
        $total_posts_count = Post::where('deleted', false)->count();
        $posts = Post::where('deleted', false)->orderBy('created_at', 'desc')->get(); 
        return view('post.index', [
            'total_posts_count' => $total_posts_count,
            'posts' => $posts
        ]); 
    }

    function create()
    {
        return view('post.create');
            
    }

    function show($id, Request $request)
    {
        $post = Post::find($id);
        return view('post.show', [
            'notice' => $request->session()->get('notice'),
            'post' => $post   //'post는 view단에서 쓰이는 변수'
        ]);  
    }

    function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit',[
            'post' => $post   //'post는 view단에서 쓰이는 변수'
        ]);  
    }

    function store(Request $request)
    {
        $rules = array(
            'title' => 'required',
            'content' => 'required',
            'password' => 'required'
        );
        $messages = array(
            'title.required' => '타이틀을 입력해주세요',
            'content.required' => '내용을 입력해주세요',
            'password.required' => '비밀번호를 입력해주세요'
        );
        $validator = Validator::make($request->all(),$rules,$messages); 
        
        
        if ($validator->fails()) {
            return redirect('/posts/create')
            ->withErrors($validator)
            ->withInput();
        }else{
            $post = new Post;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->password = Crypt::encrypt($request->password);
            $post->save();    
            return redirect('/posts');
        }
    }
    function update($id,Request $request){
        $this->validate($request, [
            'content' => 'required'
        ]);
        $post = Post::find($id);
        $post->content = $request->content;
        $post->save();
        return redirect(url('/posts/' . $id));
    }

    function haha($id)
    {
        $post = Post::find($id);
        return view('post.delete',[
            'post' => $post
        ]);
    }

    function destroy($id,Request $request)
    {
        $this->validate($request, [
            'password' => 'required'
        ]);

        $post = Post::find($id);

        if ($post->password == Crypt::encrypt($request->password)) {
            $post->deleted = true;
            $post->save(); 
            return redirect('/posts');
        } else {
            $request->session()->flash('notice', '패스워드가 틀렸습니다.');
            return redirect(url('posts/' . $post->id));
        }
    }
}
