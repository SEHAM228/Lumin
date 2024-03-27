<?php

namespace App\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'post_id', 'body'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    

    public function getCreatedAtAttribute($value){

        return Carbon::parse($value)->diffForHumans();

    }
}
