<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Topics(){
        return $this->hasMany(Topic::class);
    }
}
