<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortenURL extends Model
{
    /** @use HasFactory<\Database\Factories\ShortenURLFactory> */
    use HasFactory;


    protected $fillable = 
    [
        'url',
        'shortCode',
        'accessCount'
    ];
}
