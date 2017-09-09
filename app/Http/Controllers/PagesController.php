<?php

namespace App\Http\Controllers;
use App\Page;


use App\Repositories\Pages;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function __construct()
    {

    }



    /********** admin display list *************/

    public function admin_list(Pages $pages)
    {
        $pages = $pages->all();

//        exit('here');

        return view('admin.pages_admin.list', compact('pages'));
    }


    /******* admin create new post *************/

    public function admin_post_create()
    {
        return view('admin.posts_admin.create');

    }

    public function admin_post_edit(Page $page)
    {
        return view('admin.posts_admin.edit', compact('page'));
    }

    public function admin_post_update(Page $page)
    {
        //check the request data is valid
        $this->validate(request(), [
            'title' => 'required|min:3',
            'content' => 'required'
        ]);


        // if request data is valid then update the post
        $page->update(request(['title', 'content']));

        // send flash message to notify user of successful update
        session()->flash('message', 'Post successfully updated');

        return redirect()->back();
    }

    public function admin_post_store()
    {

        $page = null; // set initial post var, will need this later

        // check validation
        $this->validate(request(), [
            'title' => 'required|min:3',
            'content' => 'required'
        ]);

        // if validation passed and user has permission create post
        auth()->user()->publish(
            $page = new Page(request(['title', 'content'])) // set and create post
        );

        // success message
        session()->flash('message', 'Post successfully published');



        // redirect to the created posts edit page
        return redirect()->route('post_edit', ['page' => $page->id]);
    }
}
