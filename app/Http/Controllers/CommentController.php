<?php

namespace App\Http\Controllers;

use Crypt;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Comment;

class CommentController extends Controller
{
	function store($post_id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'content' => 'required'
        ]);

    	$post = Post::find($post_id);
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->content = $request->content;
        $comment->password = Crypt::encrypt($request->password);
        $post->comments()->save($comment);

        return redirect(url('posts/' . $post->id));
    }
    function destroy($post_id,$id,Request $request)
    {
        // $this->validate($request, [
        //     'password' => 'required'
        // ]);

        $post = Post::find($post_id);
        $password = $post->password;

        if($password == $request->password){
            $post->delete();
            return redirect('/posts/'.$post->id);
        }else{
            $this->validate($request, [
            'password' => 'confirmed'
        ]);
            echo '<script>alert(\'비밀번호가 틀립니다.\')</script>';
        }
        
    }
}
