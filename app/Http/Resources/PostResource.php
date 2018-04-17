<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\UserResource;

class PostResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       //return parent::toArray($request);
        return [
            'title' => $this->title,
            'body' => $this->description,
            'user'=> new UserResource($this->user),
        ];
    }
}
