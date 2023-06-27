<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjetoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'capa' => url($this->capa),
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'categoria_id' => $this->categoria_id,
            'categoria_nome' => $this->categoria->nome
        ];
    }
}
