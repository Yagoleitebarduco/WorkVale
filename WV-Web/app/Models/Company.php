<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'fantasy_name', 'cnpj', 'email', 'phone', 'industry', 'description', 'city', 'address', 'status'];
    public function jobs()
    {
        return $this->hasMany(JobPosting::class);
    }
}
