<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

class Admin extends Model
{
    protected $fillable = [
        'is_admin',
        'admin_name',
        'admin_email',
        'admin_password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'admin_password',
        ];
    }
}
