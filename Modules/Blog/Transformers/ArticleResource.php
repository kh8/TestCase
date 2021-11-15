<?php

namespace Modules\Blog\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'article_id' => $this->resource->id,
            'author_id' => $this->resource->user_id,
            'title' => $this->resource->title,
            'content' => $this->resource->content
        ];
    }
}
