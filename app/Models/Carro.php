<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    use HasFactory;

    protected $table = 'carros';

    protected $fillable = [
        'modelo',
        'placa',
        'marca',
        'ano',
        'preco_diaria',
        'descricao',
        'status'
    ];

    public function alugueis()
    {
        return $this->hasMany(Aluguel::class);
    }
}
