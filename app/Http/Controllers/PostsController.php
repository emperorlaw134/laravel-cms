<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth')->except(['index', 'show']); come back here
    }
    
    //php artisan make:model Post -mc

    public function index(Posts $posts)
    {
//        dd($posts);

//        return session('message');

        $posts = $posts->all();

//        $posts = Post::latest()
//            ->filter(request(['month', 'year']))
//            ->get();

//        $posts =Post::latest();
//
//        if ($month = request('month'))
//        {
//            $posts->whereMonth('created_at', Carbon::parse($month)->month);
//        }
//
//        if($year = request('year'))
//        {
//            $posts->whereYear('created_at', $year);
//        }
//
//        $posts = $posts->get();

        //sort posts by month / year and show total number of posts for that month, to display in sidebar

//        $archives = Post::archives();

//        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
//            ->groupBy('year', 'month')
//            ->orderByRaw('min(created_at)desc')
//            ->get()
//            ->toArray();



        return view('posts.index', compact('posts'));
    }

    // need to move else where
    public function admindash()
    {
//        exit('here');

        if (!Auth::check())
        {
//            exit('here');
            return view('sessions.create');

        }
        return view('admin.dash');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');

    }

    public function store()
    {
//        dd(request()->all());
        // Create a new post using the request data

//        $post = new Post;
//
//        $post->title = request('title');
//        $post->content  = request('content');

        $this->validate(request(), [
            'title' => 'required|min:3',
            'content' => 'required'
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'content']))
        );

        session()->flash('message', 'Post successfully published');

        /* mass assigning */
       /* Post::create([
            'title' => request('title'),
            'content' => request('content'),
            'user_id' => auth()->id()
        ]);*/

        // save a post to the db

//        $post->save();

        //and then redirect to all posts

        return redirect('/');
    }


    /********** admin display list *************/

    public function admin_list(Posts $posts)
    {
        $posts = $posts->all();

        return view('admin.posts_admin.list', compact('posts'));
    }


    /******* admin create new post *************/

    public function admin_post_create()
    {
        return view('posts.create');

    }

    public function admin_post_edit(Post $post)
    {
        return view('admin.posts_admin.edit', compact('post'));
    }

    public function admin_post_update(post $post)
    {
        $this->validate(request(), [
            'title' => 'required|min:3',
            'content' => 'required'
        ]);

        auth()->user()->publish(
             $post->update()
        );

        session()->flash('message', 'Post successfully updated');

        return redirect('/');
    }

    public function admin_post_store()
    {


        $this->validate(request(), [
            'title' => 'required|min:3',
            'content' => 'required'
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'content']))
        );

        session()->flash('message', 'Post successfully published');



        //Refresh and stay on current page

        return redirect()->back();
    }

}
