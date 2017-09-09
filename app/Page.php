<?php

namespace App;
use Carbon\Carbon;
use App\Tag;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($content)
    {

        $this->comments()->create(compact('content'));
//        Comment::create([
//            'content' => $content,
//            'post_id' => $this->id
//        ]);
    }

    public function scopeFilter($query, $filters )
    {



        if ($month = $filters['month'])
        {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = $filters['year'])
        {
            $query->whereYear('created_at', $year);
        }



    }

    public static function  archives()
    {

        return  static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at)desc')
            ->get()
            ->toArray();

    }

    public function tags()
    {
        //  1 post may have many tags
        // any tag maybe applied to many posts

        return $this->belongsToMany(Tag::class);
    }
}
