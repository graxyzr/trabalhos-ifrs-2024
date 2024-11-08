<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome_imobiliaria',
        'endereco',
        'preco',
        'venda_ou_aluguel',
    ];

    // Define que o campo 'preco' deve ser tratado como decimal com 2 casas decimais
    protected $casts = [
        'preco' => 'decimal:2',
    ];
}
