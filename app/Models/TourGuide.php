<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourGuide extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'tb_tourguide';
    protected $fillable = ['no', 'id', 'nama', 'phone', 'email'];
}
