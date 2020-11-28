<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;

    /**
     * The database table that should be used
     */
    protected $table = "pages";


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'slug',
        'title',
        'body',
        'user_id',
        'template',
    ];
}
