<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_en', 'body_en', 'photo', 'category_id', 'user_id', 'slug', 'published', 'premium'
    ];
    public function user(){
      return $this->belongsTo(User::class, 'user_id'); 
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comment(){
        return $this->hasMany(Admin::class);
    }
    public function scopePublished($query){
        return $query->where('published',1);
    }
    public function scopePremium($query){
        return $query->where('premium',1);
    }
    public function scopeSimple($query){
        return $query->where('simple',0);
    }
    public function getRouteKeyName(){
        return 'slug' ;
    }
       
    // Post.php
public function reactions() {
    return $this->hasMany(reaction::class);
}

public function tags(){
    return $this->belongsToMany(Tag::class);
}
}


