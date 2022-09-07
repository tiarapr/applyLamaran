<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SkillCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\SkillResourceShort';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'createdAt' => $this->created_at,
            'createdBy' => $this->created_by,
            'updatedAt' => $this->updated_at,
            'updatedBy' => $this->updated_by,
            'deletedAt' => $this->deleted_at,
            'deletedBy' => $this->deleted_by,
        ];
    }
}
