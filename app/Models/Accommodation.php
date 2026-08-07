<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'municipality',
        'type',
        'no_of_rooms',
        'male_employees',
        'female_employees',
        'year',
        'province',
        'month',          
        'ga_domestic',    
        'ga_foreign',     
        'gn_domestic',   
        'gn_foreign',     
        'rooms_occupied',
        'number_of_nights',
    ];
}