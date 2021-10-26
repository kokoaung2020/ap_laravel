<?php

namespace App\Models;

use App\Mail\StoredPost;

use App\Mail\PostCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    //protected $fillable = ['name','description'];
     protected $guarded = [];

     public function categories()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }




    // ---------------------  week6.2 hook eloquent event  ----------------------------

    protected static function booted()
    {
        // static::created(function ($post) {
        //     Mail::to('kokoaung2019aungaung@gmail.com')->send(new StoredPost($post));
        // });
    }

}
