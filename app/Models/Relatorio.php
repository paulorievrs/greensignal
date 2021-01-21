<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    use HasFactory;

    protected $table = 'relatorios';

    protected $fillable = [
        'filial_id',
        'codigoDoProduto',
        'user_id',
        'descricao',
        'fornecedor_id',
    ];

    public function vendarelatorio()
    {
        return $this->belongsToMany(VendaRelatorio::class, 'relatorio_id');
    }

    public function produto()
    {
        return $this->hasOne(Produto::class, 'codigoDoProduto', 'codigoDoProduto');
    }

    public function fornecedor()
    {
        return $this->hasOne(Fornecedor::class, 'id', 'fornecedor_id');
    }

    public function filial()
    {
        return $this->hasOne(Filiais::class, 'id', 'filial_id');
    }
}
