<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedor';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'cnpj'
    ];

    public function relatorio()
    {
        return $this->hasMany(Relatorio::class, 'fornecedor_id');
    }
}
