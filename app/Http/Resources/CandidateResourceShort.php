<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CandidateResourceShort extends JsonResource
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
            'jobId' => $this->job_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'year' => $this->year,
            'jobs' => $this->jobs,
            'skills' => $this->skills,
            'createdAt' => $this->created_at,
            'createdBy' => $this->created_by,
            'updatedAt' => $this->updated_at,
            'updatedBy' => $this->updated_by,
            'deletedAt' => $this->deleted_at,
            'deletedBy' => $this->deleted_by,
        ];
    }
}
