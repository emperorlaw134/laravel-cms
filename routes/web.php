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
Route::get('/login', 'SessionsController@create');
Route::get('/logout', 'SessionsController@destroy');
Route::post('/login', 'SessionsController@store');

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
