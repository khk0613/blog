<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;


class DeleteController extends Controller
{
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
            'password1' => 'required'
        ]);

        $post = Post::find($id);
        $password = $post->password;

        if($password == $request->password1){
            $post->deleted = true;
            $post->save();    
            return redirect('/posts');
        }else{
            echo '<script>alert(\'비밀번호가 틀립니다.\')</script>';
        }
        
    }
}
