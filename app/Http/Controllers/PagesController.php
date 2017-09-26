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


    /******* admin create new page *************/

    public function admin_page_create()
    {
        return view('admin.pages_admin.create');

    }

    public function admin_page_edit(Page $page)
    {
        return view('admin.pages_admin.edit', compact('page'));
    }

    public function admin_page_update(Page $page)
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

    public function admin_page_store()
    {

        $page = null; // set initial post var, will need this later

        // check validation

        //var_dump(request());
       // exit();
        $this->validate(request(), [
            'title' => 'required|min:3',
            'content' => 'required'
        ]);

        // if validation passed and user has permission create post
        auth()->user()->publish_page(
            $page = new Page(request(['title', 'content'])) // set and create page
        );

        // success message
        session()->flash('message', 'Page successfully published');



        // redirect to the created pages edit page
        return redirect()->route('page_edit', ['page' => $page->id]);
    }

    // delete page by id
    public function destroy($id)
    {
        Page::findOrFail($id)->delete();
        session()->flash('message', 'Page Deleted with ID of : ' . $id);
        return redirect()->route('page_list');
    }

}
