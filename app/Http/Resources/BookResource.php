<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'isbn' => $this->isbn,
            'title' => $this->title,
            'authors' => AuthorResource::collection($this->authors),
            'published' => $this->published,
            'subtitle' => $this->subtitle,
            'rating' => $this->rating,
            'thumbnails' => ThumbnailResource::collection($this->thumbnails),
            'description' => $this->description,
        
          ];
    }
}
