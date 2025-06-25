<?php

namespace packages\Presenter\Resources\Users;

use Illuminate\Http\Resources\Json\JsonResource;
use packages\Domain\Models\Pagination\UserPagination;

/**
 * ユーザ一覧 Resource クラス
 * @package packages\Presenter\Resources\Users
 */
class IndexUserResource extends JsonResource
{
    /**
     * @var UserPagination
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
            'total'         => $this->resource->getTotal(),
            'current_page'  => $this->resource->getCurrentPage(),
            'last_page'     => $this->resource->getLastPage(),
            'data'          => $this->resource->mapData(function ($user) {
                return [
                    'id'        => $user->getId(),
                    'name'      => $user->getName(),
                    'login_id'  => $user->getLoginId(),
                    'role'      => $user->getRoleType()->label(),
                    'group'     => $user->getGroupName(),
                ];
            }),
        ];
    }
}
