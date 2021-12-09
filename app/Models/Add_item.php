<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add_item extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function country(){
        return $this->belongsTo(country::class, "country_id");
    }
    
}
