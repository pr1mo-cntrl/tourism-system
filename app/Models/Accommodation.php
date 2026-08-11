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
        'ga_ph_count',
        'ga_ph_province',
        'ga_non_fil_count',
        'ga_non_fil_country',
        'ga_unspecified',
        'ga_overseas_filipinos',
        'gn_ph_province',
        'gn_non_fil_country',
        'gn_unspecified',
        'gn_overseas_filipinos',
    ];
}