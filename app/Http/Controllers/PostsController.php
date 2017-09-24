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
            return redirect()->route('login');

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

        $post = null; // set initial post var, will need this later

        // check validation
        $this->validate(request(), [
            'title' => 'required|min:3',
            'content' => 'required'
        ]);

        // if validation passed and user has permission create post
        auth()->user()->publish(
           $post = new Post(request(['title', 'content'])) // set and create post
        );

        // success message
        session()->flash('message', 'Post successfully published');

//        var_dump($post->id);


        /* mass assigning */
       /* Post::create([
            'title' => request('title'),
            'content' => request('content'),
            'user_id' => auth()->id()
        ]);*/

        // save a post to the db

//        $post->save();

        //and then redirect to all posts

//        var_dump($post);
//        exit();

        // redirect to the created posts edit page
        return redirect()->route('post_edit', ['post' => $post->id]);
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
        return view('admin.posts_admin.create');

    }

    public function admin_post_edit(Post $post)
    {
        return view('admin.posts_admin.edit', compact('post'));
    }

    public function admin_post_update(post $post)
    {
        //check the request data is valid
        $this->validate(request(), [
            'title' => 'required|min:3',
            'content' => 'required'
        ]);


        // if request data is valid then update the post
        $post->update(request(['title', 'content']));

        // send flash message to notify user of successful update
        session()->flash('message', 'Post successfully updated');

        return redirect()->back();
    }

    public function admin_post_store()
    {

        $post = null; // set initial post var, will need this later

        // check validation
        $this->validate(request(), [
            'title' => 'required|min:3',
            'content' => 'required'
        ]);

        // if validation passed and user has permission create post
        auth()->user()->publish(
            $post = new Post(request(['title', 'content'])) // set and create post
        );

        // success message
        session()->flash('message', 'Post successfully published');



        // redirect to the created posts edit page
        return redirect()->route('post_edit', ['post' => $post->id]);
    }

    /**
     * @return string
     */
    public function destroy($id)
    {

        Post::findOrFail($id)->delete();
        return redirect()->route('admin');

    }

}
