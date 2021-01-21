<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiais extends Model
{
    use HasFactory;
    protected $table = 'filiais';

    public function relatorio()
    {
        return $this->hasMany(Relatorio::class, 'filial_id');
    }
}
