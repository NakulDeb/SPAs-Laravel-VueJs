<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class PostDescription extends Model
{
    use Searchable;
    protected $fillable = [
        'post_id', 'description'
    ];

    public function searchableAs()
    {
        return 'post_descriptions';
    }
}
