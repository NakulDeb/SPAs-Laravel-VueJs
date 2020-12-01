<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;
    protected $fillable = [
        'author_id', 'category_id', 'title', 'status', 'photo'
    ];


    public function postDescription()
    {
        return $this->hasOne(PostDescription::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function searchableAs()
    {
        return 'posts';
    }


    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array['category'] = $this->category['name'];
        $array['postDescription'] = $this->postDescription['description'];
        return $array;
    }
//
//    public function getScoutKey()
//    {
//        return $this->email;
//    }
//
//    public function getScoutKeyName()
//    {
//        return 'email';
//    }
}
