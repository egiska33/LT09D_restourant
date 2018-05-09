<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reservation extends Model
{
    protected $fillable = [
        'person_count', 'date', 'time', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
