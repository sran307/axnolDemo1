<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function state(){
        return $this->hasMany(state::class, "country_id");
    }
    
}
