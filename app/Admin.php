<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function applications(){
    //     return $this->belongsToMany(Therapist::class)->orderBy('created_at', 'DESC');
    // }
}
