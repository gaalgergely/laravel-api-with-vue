<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Contact extends JsonResource
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
            'data' => [
                'contact_id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'birthday' => $this->birthday->format('Y-m-d\TH:i:s.\0\0\0\0\0\0\Z'),
                'company' => $this->company
            ],
            'links' => [
                'self' => $this->path()
            ]
        ];
    }
}
