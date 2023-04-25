<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Langue extends Model
{
    use HasFactory;

    static public function langueSelect(){
        $lang = session('localeDB');

        return Langue::select('id', 
        DB::raw("(CASE WHEN langue$lang IS NULL THEN langue ELSE langue$lang END) as langue"))
        ->orderby('langue')->get();
    }
}