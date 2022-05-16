<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    // ini relasi invers, dari relasi tabel kategori yg memiliki banyak post, inversnya yaitu one to one >> belongsTo
    public function category() {

        return $this->belongsTo(Category::class, 'category_id');

    }
}
