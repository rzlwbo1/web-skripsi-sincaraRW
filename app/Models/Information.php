<?php

namespace App\Models;

use App\Http\Controllers\CategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    // relationship

    public function categoryInformation() {

        return $this->belongsTo(CategoryInformation::class, 'category_information_id');

    }

    public function user() {

        return $this->belongsTo(User::class, 'user_id');

    }
}
