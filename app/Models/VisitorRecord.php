<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'month',
        'year',
        'municipality_name',
        'attraction_name',
        'attraction_code',
        'local_male',
        'local_female',
        'other_mun_male',
        'other_mun_female',
        'other_prov_male',
        'other_prov_female',
        'foreign_male',
        'foreign_female',
        'unspecified_male',   
        'unspecified_female',  
    ];
}