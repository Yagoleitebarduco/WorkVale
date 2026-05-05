<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'companies';

    protected $fillable = [
        'is_admin',
        'is_freelancer',

        'company_name',
        'description',
        'cpf_cnpj',
        'areaActivies_id',
        'assessment',
        'representative_name',
        'email',
        'phone_number',
        'address',
        'neighborhood',
        'number',
        'cep',
        'city_id',
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function areas_activies() {
        return $this->belongsTo(AreaActivy::class);
    }
}
