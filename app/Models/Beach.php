<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beach extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'city',
        'n_umbrellas',
        'n_seats',
        'umbrellas_day_price',
        'opening_date',
        'closing_date',
        'has_volley',
        'has_football',
        'description',
        'thumb',
    ];
}
