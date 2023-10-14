<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'company', 'description', 'email', 'location', 'website', 'tags'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
