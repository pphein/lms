<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BookCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        $result = [];
        foreach ($this->collection as $collect) {
            $authors = $collect->authors->pluck('pen_name');
            if (count($authors) == 1) {
                $authors = $authors[0];
            }
            $result[] = [
                'id' => $collect->id,
                'title' => $collect->title,
                'summary' => $collect->summary,
                'author' => $collect->authors->first()->pen_name, //$authors,
                'publisher' => $collect->publisher?->name,
                'edition' => $collect->edition?->name,
                'price' => $collect->price,
                'published_date' => $collect->published_date
            ];
        }

        return $result;
    }
}
