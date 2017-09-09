<?php
namespace App\Repositories;


use App\Page;
use App\Redis;

class Pages
{
    protected $redis;

    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }
    // show all pages
    public function all()
    {
        return Page::all();
    }
}
