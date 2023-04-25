<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'nom', 
        'date_naissance', 
        'adresse', 
        'phone', 
        'email', 
        'ville_id'
    ];

    public function etudiantHasVille(){
        return $this->hasOne('App\Models\Ville', 'id', 'ville_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function etudiantHasPosts() 
    {
        return $this->hasMany(BlogPost::class);
    }
}
