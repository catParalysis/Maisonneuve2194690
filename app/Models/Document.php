<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'user_id',
        'file_path',
        'file_name',
    ];

    public function documentHasUser() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

}
