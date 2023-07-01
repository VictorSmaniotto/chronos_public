<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
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
            'descricao' => Str::limit(html_entity_decode(strip_tags($this->descricao)), 100),
            'categoria_id' => $this->categoria_id,
            'categoria_nome' => $this->categoria->nome,
            'link' => route('site.mobile.visualizar', $this->id)
        ];
    }
}
