<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Services extends JsonResource
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
      'id' => $this->id,
      'nro_cliente' => $this->nro_cliente,
        'fecha' => $this->fecha,
        'servicio' => $this->servicio,
        'activo' => true,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at
    ];
  }
}
