<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'title', 'photo', 'description', 'menu_id', 'price'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
