<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doujin extends Model
{
    protected $table = 'doujin';
    protected $primaryKey = 'flight_id';
    protected $fillable = ['id_doujin'];
}
