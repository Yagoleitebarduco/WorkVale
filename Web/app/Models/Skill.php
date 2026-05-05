<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Skill extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'skill',
        'category',
    ];

    public function user() {
        return $this->belongsToMany(User::class, 'skill_user');
    }

    public function work() {
        return $this->belongsToMany(Work::class, 'skill_work');
    }
}
