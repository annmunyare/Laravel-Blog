<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 


class Post extends Model
{
    //
    // protected $primaryKey = 'postId';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
public static function   archives()
{
    return static::selectRaw(' 
    year(created_at) year,
    monthname(created_at) month,
    count(*) published')
    ->orderByRaw('min(created_at) desc')
    ->groupBy('year','month')->get();

}
    
    public function comments()
    {
        return $this ->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function addComment($body)
    {
        //
        $this->comments()->create(compact("body"));
      
    }
    public function scopeFilter($query, $filters){
 
        if(!$filters) {
            return $query;
            }
            
            if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
            }
            
            if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
            }

        }
}

