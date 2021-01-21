<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendaRelatorio extends Model
{
    use HasFactory;

    protected $table = 'vendarelatorio';
    protected $fillable = [
        'mesesAno',
        'valorTotal',
        'relatorio_id'
    ];

    public function relatorio()
    {
        return $this->hasOne(Relatorio::class, 'relatorio_id');
    }

}
