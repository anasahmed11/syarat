<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class EmployeeResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name'=>$this->first_name.' '.$this->last_name,
            'email' => $this->email,
            'salary' => $this->salary,
            'manager'=>new ManagerResource($this->manager),
            'image' => $this->image ? '' . URL::to('/') . '/' . $this->image : '' . URL::to('/') . '/public/default/default-shop.jpg',

        ];
    }
}
