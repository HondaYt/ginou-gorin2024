<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'title'=>$this->title,
            'body'=>$this->title,
            'timestamps'=>[
                'created'=>$this->created_at,
                'updated'=>$this->updated_at,
            ]
        ];
    }
}
