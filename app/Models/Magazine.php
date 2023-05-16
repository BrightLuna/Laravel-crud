<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    protected $table = 'magazine';
    protected $primaryKey = 'flight_id';
    protected $fillable = ['id_magazine'];
}
