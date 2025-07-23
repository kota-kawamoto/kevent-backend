<?php

namespace packages\Presenter\Resources\Groups;

use Illuminate\Http\Resources\Json\JsonResource;

class GetGroupResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource['id'],
            'name' => $this->resource['name'],
        ];
    }
}
