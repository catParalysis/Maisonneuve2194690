<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'body',
        'body_en',
        'date',
        'user_id'
    ];

    public function forumHasUser() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}