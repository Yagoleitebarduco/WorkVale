<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    protected $fillable = [
        'is_admin',
        'complete_name',
        'cpf',
        'birth_date',
        'email',
        'phone_number',
        'city',
        'district',
        'profression_title',
        'skills',
        'portfolio_link',
        'bio',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
