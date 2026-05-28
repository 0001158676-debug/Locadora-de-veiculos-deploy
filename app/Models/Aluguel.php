<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluguel extends Model
{
    use HasFactory;

    protected $table = 'aluguels';

    protected $fillable = [
        'usuario_id',
        'carro_id',
        'data_inicio',
        'data_final_prevista',
        'data_final_entregue',
        'status'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function carro()
    {
        return $this->belongsTo(Carro::class);
    }
}
