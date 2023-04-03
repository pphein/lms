<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return [
        //     'title' => $this->title,
        //     'summary' => $this->summary,
        //     'author' => $this->author_id,
        //     'publisher' => $this->publisher_id,
        //     'edition' => $this->edition_id,
        //     'price' => $this->price,
        //     'category' => $this->category_id
        // ];

        return parent::toArray($request);
    }
}
