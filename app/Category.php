<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use Searchable;
    protected $fillable = [
        'name', 'title', 'description'
    ];

    public function searchableAs()
    {
        return 'categories';
    }

}
