<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PandaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $today = new \DateTime();
        $age = $this->birth->diff($today);
        return [
            "id" => $this->id,
            "name" => $this->name,
            "sex" => $this->sex,
            "birth" =>$this->birth,
            "age" => $age->format("%y"),
        ];
    }
}
