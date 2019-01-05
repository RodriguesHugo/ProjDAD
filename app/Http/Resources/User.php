<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class User extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'type' => $this->type,
            'username' => $this->username,
            'last_shift_start' => $this->last_shift_start,
            'last_shift_end' => $this->last_shift_end,
            'shift_active' => $this->shift_active,
        ];
    }
}
