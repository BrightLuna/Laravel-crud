<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    protected $table = 'manga';
    protected $primaryKey = 'flight_id';
    protected $fillable = ['id_manga'];
}
