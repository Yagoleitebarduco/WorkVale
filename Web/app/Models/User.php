<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\City;
use App\Models\Company;
use App\Models\Skill;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'is_admin',
        'is_freelancer',

        'profile_picture',
        'complete_name',
        'cpf',
        'email',
        'phone_number',
        'birth_date',
        'address',
        'neighborhood',
        'number',
        'cep',
        'city_id',
        'professional_title',
        'portifolio_link',
        'bio',
        'password',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function skill() {
        return $this->belongsToMany(Skill::class, 'skill_user');
    }
}
