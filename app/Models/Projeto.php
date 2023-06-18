<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function getSituacaoAttribute($value)
    {
        $situacao = [
            1 => 'Iniciado',
            2 => 'Em andamento',
            3 => 'Concluído',
            // Adicione mais opções de situação conforme necessário
        ];

        return $situacao[$value] ?? 'Desconhecido';
    }
}
