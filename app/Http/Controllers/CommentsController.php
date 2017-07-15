<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    //

    public function store(Post $post)
    {
        $this->validate(request(), ['content' => 'required|min:3']);
        // add a comment to a post
        $post->addComment(request('content'));



        return back();
    }
}
