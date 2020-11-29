<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name', 'user_id', 'category', 'description', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
