<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Empresa extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'razao_social',
        'nome_fantasia',
        'cnpj_cpf',
        'area_atuacao',
        'nome_responsavel',
        'email_corporativo',
        'telefone_contato',
        'cidade_sede',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'estado',
        'endereco_completo',
        'pequena_descricao',
        'senha',
        'ativo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'senha',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'ativo' => 'boolean',
        'email_verified_at' => 'datetime',
        'senha' => 'encrypted', // Criptografa automaticamente o campo senha [[11]]
        'cnpj_cpf' => 'encrypted', // Criptografa CNPJ/CPF por ser dado sensível [[12]]
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Define o nome da tabela (opcional, Laravel já pluraliza automaticamente)
     */
    protected $table = 'empresas';

    /**
     * Define a chave primária
     */
    protected $primaryKey = 'id';

    /**
     * Define se a chave primária é auto-incremento
     */
    public $incrementing = true;

    /**
     * Define o tipo da chave primária
     */
    protected $keyType = 'int';

    // ==================== MUTATORS ====================

    /**
     * Define o atributo senha com hash
     */
    public function setSenhaAttribute($value): void
    {
        $this->attributes['senha'] = bcrypt($value);
    }

    /**
     * Formata CNPJ/CPF antes de salvar
     */
    public function setCnpjCpfAttribute($value): void
    {
        // Remove formatação e salva apenas números
        $this->attributes['cnpj_cpf'] = preg_replace('/[^0-9]/', '', $value);
    }

    /**
     * Formata telefone antes de salvar
     */
    public function setTelefoneContatoAttribute($value): void
    {
        // Remove formatação e salva apenas números
        $this->attributes['telefone_contato'] = preg_replace('/[^0-9]/', '', $value);
    }

    // ==================== ACCESSORS ====================

    /**
     * Retorna CNPJ/CPF formatado
     */
    public function getCnpjCpfFormatadoAttribute(): string
    {
        $cnpj_cpf = preg_replace('/[^0-9]/', '', $this->cnpj_cpf);
        
        if (strlen($cnpj_cpf) === 11) {
            // CPF: 000.000.000-00
            return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $cnpj_cpf);
        } elseif (strlen($cnpj_cpf) === 14) {
            // CNPJ: 00.000.000/0001-00
            return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $cnpj_cpf);
        }
        
        return $cnpj_cpf;
    }

    /**
     * Retorna telefone formatado
     */
    public function getTelefoneContatoFormatadoAttribute(): string
    {
        $telefone = preg_replace('/[^0-9]/', '', $this->telefone_contato);
        
        if (strlen($telefone) === 10) {
            // (11) 9999-9999
            return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $telefone);
        } elseif (strlen($telefone) === 11) {
            // (11) 99999-9999
            return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $telefone);
        }
        
        return $telefone;
    }

    /**
     * Retorna nome fantasia ou razão social
     */
    public function getNomeExibicaoAttribute(): string
    {
        return $this->nome_fantasia ?? $this->razao_social;
    }

    // ==================== SCOPES ====================

    /**
     * Scope para empresas ativas
     */
    public function scopeAtivas($query)
    {
        return $query->where('ativo', true);
    }

    /**
     * Scope para buscar por CNPJ/CPF
     */
    public function scopePorDocumento($query, $documento)
    {
        $documento = preg_replace('/[^0-9]/', '', $documento);
        return $query->where('cnpj_cpf', $documento);
    }

    /**
     * Scope para buscar por área de atuação
     */
    public function scopePorAreaAtuacao($query, $area)
    {
        return $query->where('area_atuacao', $area);
    }

    // ==================== MÉTODOS ADICIONAIS ====================

    /**
     * Verifica se é CNPJ
     */
    public function ehCnpj(): bool
    {
        return strlen(preg_replace('/[^0-9]/', '', $this->cnpj_cpf)) === 14;
    }

    /**
     * Verifica se é CPF
     */
    public function ehCpf(): bool
    {
        return strlen(preg_replace('/[^0-9]/', '', $this->cnpj_cpf)) === 11;
    }

    /**
     * Retorna endereço completo formatado
     */
    public function getEnderecoCompletoFormatadoAttribute(): string
    {
        $partes = [
            $this->logradouro,
            $this->numero,
            $this->complemento,
            $this->bairro,
            $this->cidade_sede,
            $this->estado,
            $this->cep,
        ];

        return implode(', ', array_filter($partes));
    }
}