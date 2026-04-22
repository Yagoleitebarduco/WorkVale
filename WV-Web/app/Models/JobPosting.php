<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPosting extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'job_postings';
    protected $fillable = ['company_id', 'title', 'description', 'requirements', 'employment_type', 'modality', 'location', 'salary_min', 'salary_max', 'status', 'published_at', 'applications_count'];
    protected $casts = ['requirements' => 'array', 'published_at' => 'datetime', 'salary_min' => 'decimal:2', 'salary_max' => 'decimal:2'];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
    public function getModalityLabelAttribute()
    {
        return match ($this->modality) {
            'remote' => 'Remoto',
            'hybrid' => 'Híbrido',
            'onsite' => 'Presencial'
        };
    }
    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'active' => 'Ativa',
            'paused' => 'Pausada',
            'closed' => 'Fechada',
            'draft' => 'Rascunho'
        };
    }
    public function getStatusBadgeAttribute()
    {
        return match ($this->status) {
            'active' => 'bg-green-100 text-green-700',
            'paused' => 'bg-yellow-100 text-yellow-700',
            'closed' => 'bg-gray-100 text-gray-700',
            'draft' => 'bg-blue-100 text-blue-700'
        };
    }
}
