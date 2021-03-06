<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class AboutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'about_office' => $this->about_office,
        ];
    }
}
