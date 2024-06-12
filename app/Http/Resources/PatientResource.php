<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
   /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(Request $request)
    {
        return [
            'cpf' => $this->cpf,
            'cns' => $this->cns,
            'nome' => $this->name,
            'dn' => $this->birth,
            'email' => $this->email,
            'telefone' => $this->phone,
            'município' => "{$this->county->name}/{$this->county->fu}"
        ];
    }
}
