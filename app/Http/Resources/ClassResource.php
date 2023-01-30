<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sks' => $this->sks,
            'max_participants' => $this->max_participant,
            'current_participants' => $this->current_participant,
            'teacher_data' => [
                'data_url' => url("/users/{$this->teacher_id}"),
            ]
        ];
    }
}
