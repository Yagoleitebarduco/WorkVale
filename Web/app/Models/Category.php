<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'category_id'
    ];


    public function categories() {
        return $this->belongsTo('category_id', Category::class);
    }
}
