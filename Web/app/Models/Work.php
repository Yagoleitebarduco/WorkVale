<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Override;

class Work extends Model
{
    protected $fillable = [
        'companies_id',
        'name_work',
        'description_work',
        'start_date',
        'end_date',
        'duration',
        'type_work',
        'payment',
        'status',
    ];

    public function company() {
        return $this->belongsTo(Company::class, 'companies_id');
    }

    
    public function skills() {
        return $this->belongsToMany(Skill::class, 'skill_work');
    }

    public function applicants() {
        return $this->belongsToMany(User::class, 'user_work');
    }
}
