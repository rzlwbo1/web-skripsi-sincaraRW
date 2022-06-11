<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\CategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Information extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function scopeFilter($query, array $filters) {

        // ?? itu pengganti isset() yaitu colleaseing null
        // ini logical group, jadi singkatnya kita ada where di dlm where dgn orWhere
    
        $query->when($filters['search_query'] ?? false, function($query, $search_query) {
            return $query->where(function(Builder $query) use ($search_query) {
                    $query->where('title', 'like', '%' . $search_query . '%')
                        ->orWhere('body', 'like', '%' . $search_query . '%');
            });
        });


        $query->when($filters['category_info'] ?? false, function($query, $category_info) {

            // use itu ambil variabel dari parent scope, categoryEvent = model
            return $query->whereHas('categoryInformation', function(Builder $query) use ($category_info) {
                $query->where('slug', $category_info);
            });
        });
    }


    // relationship

    public function categoryInformation() {

        return $this->belongsTo(CategoryInformation::class, 'category_information_id');

    }

    public function user() {

        return $this->belongsTo(User::class, 'user_id');

    }
}
