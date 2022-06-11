<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  public function scopeFilter($query, array $filters) {

    // ?? itu pengganti isset() yaitu colleaseing null
    // ini logical group, jadi singkatnya kita ada where di dlm where dgn orWhere

    $query->when($filters['search_query'] ?? false, function($query, $search_query) {
      return $query->where(function($query) use ($search_query) {
            $query->where('title', 'like', '%' . $search_query . '%')
                  ->orWhere('body', 'like', '%' . $search_query . '%');
      });
    });


    $query->when($filters['category_event'] ?? false, function($query, $category_event) {

      // use itu ambil variabel dari parent scope, categoryEvent = model
      return $query->whereHas('categoryEvent', function(Builder $query) use ($category_event) {
        $query->where('slug', $category_event);
      });

    });

    $query->when($filters['users'] ?? false, function($query, $user) {

      // use itu ambil variabel dari parent scope
      return $query->whereHas('user', function(Builder $query) use ($user) {
        $query->where('username', $user);
      });

    });



    // ini sama kek when di atas cuma pake if aja

    // if($filters['category'] ?? false) {
    //   return $query->whereHas('category', function(Builder $query) use ($filters){
    //     $query->where('slug', $filters['category']);
    //   });
    // }


    // dibawah sama kek di atas bedanya di atas lebih complex

    // if(isset($filters['search_query']) ? $filters['search_query'] : false) {
      
    //   // dd($filters);
    //   return $query->where('title', 'like', '%'. $filters['search_query'] .'%')
    //             ->orWhere('body', 'like', '%'. $filters['search_query'] .'%');

    // }



  }

  // ini relasi invers, dari relasi tabel kategori yg memiliki banyak post, inversnya yaitu one to one >> belongsTo
  public function category()
  {
    return $this->belongsTo(Category::class, 'category_id');
  }


  // satu acara memiliki satu kategori, gamau lebih, (invers)
  // tpi satu kategori ada banyak acara 
  public function categoryEvent() 
  {
    return $this->belongsTo(CategoryEvent::class, 'category_event_id');
  }

  // ini relasi invers juga yg dmnaa, satu acara cuma bisa di tulis satu user, yakali satu acara di tulis 2 user, bentrok wkwk
  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }


  // memaksa route binding yg tadinya id pake slug
  public function getRouteKeyName()
  {
      return 'slug';
  }
}
