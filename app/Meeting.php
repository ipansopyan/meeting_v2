<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['title','waktu','place','description','author_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function joinUser()
    {
        return $this->belongsToMany(User::class);
    }
}
