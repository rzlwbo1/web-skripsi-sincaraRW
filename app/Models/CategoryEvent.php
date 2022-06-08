<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryEvent extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    // relasi one to many, jadi satu kategori ada banyak acara

    public function event() {
        
        return $this->hasMany(Event::class);
    }
}
