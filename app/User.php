<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function publish(Post $post)
    {
        $this->posts()->save($post);

//        Post::create([
//            'title' => request('title'),
//            'content' => request('content'),
//            'user_id' => auth()->id()
//        ]);
    }


    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    public function publish_page(Page $page)
    {
        $this->posts()->save($page);

//        Post::create([
//            'title' => request('title'),
//            'content' => request('content'),
//            'user_id' => auth()->id()
//        ]);
    }

    // set password to send as encrypt
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);

    }
}
