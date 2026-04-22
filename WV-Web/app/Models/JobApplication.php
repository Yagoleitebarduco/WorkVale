<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobApplication extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'job_applications';
    protected $fillable = ['job_posting_id', 'user_id', 'cover_letter', 'skills', 'stage', 'internal_notes', 'interview_scheduled_at'];
    protected $casts = ['skills' => 'array', 'interview_scheduled_at' => 'datetime'];
    public function jobPosting()
    {
        return $this->belongsTo(JobPosting::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getStageLabelAttribute()
    {
        return match ($this->stage) {
            'new' => 'Novo',
            'reviewing' => 'Em Análise',
            'interview' => 'Entrevista',
            'offered' => 'Oferta',
            'hired' => 'Contratado',
            'rejected' => 'Rejeitado'
        };
    }
    public function getStageBadgeAttribute()
    {
        return match ($this->stage) {
            'new' => 'bg-gray-100 text-gray-700',
            'reviewing' => 'bg-yellow-100 text-yellow-700',
            'interview' => 'bg-blue-100 text-blue-700',
            'offered' => 'bg-purple-100 text-purple-700',
            'hired' => 'bg-green-100 text-green-700',
            'rejected' => 'bg-red-100 text-red-700'
        };
    }
}
