<?php
use App\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





//$stripe = App::make('App\Billing\Stripe');
//dd($stripe);


Route::get('/', 'PostsController@index')->name('home');
Route::get('/admin', 'PostsController@admindash')->name('admin'); // send to admin page

Route::get('posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create')->name('login');
Route::get('/logout', 'SessionsController@destroy');
Route::post('/login', 'SessionsController@store');

Route::get('/admin/posts', 'PostsController@admin_list');
Route::get('/admin/posts/create', 'PostsController@admin_post_create');
Route::post('/admin/posts', 'PostsController@admin_post_store'); // make sure view is calling this store function
Route::get('/admin/posts/{post}/edit', 'PostsController@admin_post_edit')->name('post_edit');
Route::patch('/admin/posts/{post}', 'PostsController@admin_post_update');
/***** admin Pages section *******/
Route::get('/admin/pages', 'PagesController@admin_list');
Route::get('/admin/pages/create', 'PagesController@admin_page_create');
Route::post('/admin/pages', 'PagesController@admin_page_store'); // make sure view is calling this store function
Route::get('/admin/pages/{page}/edit', 'PagesController@admin_page_edit')->name('page_edit');
Route::patch('/admin/pages/{page}', 'PagesController@admin_page_update');
Route::delete('/posts/{id}', 'PostsController@destroy');

/*post actions / Resourcefull controller

    posts
    Get /Posts
    Get /posts/create
    POST /posts
    Get /posts/{id}/edit
    Get /posts/{id}
    PATCH /posts/{id}
    DELETE /posts/{id}


*/

Route::post('/posts', 'PostsController@store');

Route::get('/old', function () {
    /*$tasks = [
        'create a user',
        'create a page',
        'create a post'
    ];*/

    $tasks = DB::table('tasks')->get(); // get all tasks

    return view('welcome', compact('tasks'));
//    return $tasks;
});
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

/*
Route::get('/tasks', function () {
    /*$tasks = [
        'create a user',
        'create a page',
        'create a post'
    ];*//*

    //$tasks = DB::table('tasks')->get(); // get all tasks
    $tasks = Task::all();

    return view('tasks.index', compact('tasks'));
//    return $tasks;
});*/
/*
Route::get('/tasks/{task}', function ($id)
{

//    $task = DB::table('tasks')->find($id);
    $task = Task::find($id);

    return view('tasks.show', compact('task'));
});*/

Route::get('about', function()
{
    return view('about');
});

// group all routes which require login
