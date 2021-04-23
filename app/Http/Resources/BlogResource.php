<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class BlogResource extends JsonResource
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
            'image' => getImageUrl('Blog', $this->image),
            'title' => $this->title,
            'content' => $this->content,
    ];
}
}
