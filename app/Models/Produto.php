<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $primaryKey = 'codigoDoProduto';
    public $incrementing = false;

    protected $fillable = [
        'codigoDoProduto',
        'ean',
        'name',
    ];

    public function relatorio()
    {
        return $this->hasMany(Relatorio::class, 'codigoDoProduto');
    }



}
