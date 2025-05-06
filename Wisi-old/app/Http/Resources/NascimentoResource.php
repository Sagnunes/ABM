<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NascimentoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'livro'=>$this->livro,
            'filho'=>$this->filho,
        ];
    }
}
