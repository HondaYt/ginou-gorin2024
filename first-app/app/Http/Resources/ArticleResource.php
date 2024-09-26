<?php

namespace App\Http\Resources;

use App\Models\Thumbnail;
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
            'body'=>$this->body,
            // 'thumbnails'=>ThumbnailResource::collection($this->thumbnails),
            // 'thumbnails'=>($this->thumbnails!== null)?$this->thumbnails->name:'',
            'thumbnails'=>$this->thumbnails?->name,
            'timestamps'=>[
                'created'=>$this->created_at,
                'updated'=>$this->updated_at,
            ]
        ];
    }
}
