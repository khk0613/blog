<?php

namespace App\Http\Controllers;

use Crypt;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Comment;

use Validator;

class CommentController extends Controller
{
	function store($post_id, Request $request)
    {
        $post = Post::find($post_id);
        $rules = array(
            'name' => 'required',
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
            return redirect('posts/' . $post->id)
            ->withErrors($validator)
            ->withInput();
        }else{
            $comment = new Comment;
            $comment->name = $request->name;
            $comment->content = $request->content;
            $comment->password = Crypt::encrypt($request->password);
            $post->comments()->save($comment);
            return redirect(url('posts/' . $post->id));
        }

    	
    }
    function destroy($id,Request $request)
    {
        $comment = Comment::find($id);
    }
}
