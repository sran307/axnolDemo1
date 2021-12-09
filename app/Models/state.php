<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function state()
    {
        return $this->hasMany(state::class, "state_id");
    }
}
