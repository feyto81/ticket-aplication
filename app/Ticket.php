<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $guarded = [];


    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
