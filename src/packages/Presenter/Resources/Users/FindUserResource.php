<?php

namespace packages\Presenter\Resources\Users;

use Illuminate\Http\Resources\Json\JsonResource;
use packages\Domain\Models\User;

/**
 * ユーザ詳細 Resource クラス
 * @package packages\Presenter\Resources\Users
 */
class FindUserResource extends JsonResource
{
    /**
     * @var User
     */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id'       => $this->resource->getId(),
            'name'     => $this->resource->getUserName(),
            'login_id' => $this->resource->getLoginId(),
            'group_id' => $this->resource->getGroupId(),
            'group_name' => $this->resource->getGroupName(),
        ];
    }
}
