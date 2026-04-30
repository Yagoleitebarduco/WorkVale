<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AreaActivy extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'area_name',
        'area_category',
    ];
}
