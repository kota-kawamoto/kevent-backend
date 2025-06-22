<?php

namespace packages\Presenter\Resources\Users;

use Illuminate\Http\Resources\Json\JsonResource;
use packages\Domain\Models\EditUserData;

/**
 * ユーザ編集画面 Resource クラス
 * @package packages\Presenter\Resources\Users
 */
class EditUserResource extends JsonResource
{
    /**
     * @var EditUserData
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
        $user = $this->resource->getUser();

        return [
            'user' => [
                'id'       => $user->getId(),
                'name'     => $user->getUserName(),
                'login_id' => $user->getLoginId(),
                'group_id' => $user->getGroupId(),
                'group_name' => $user->getGroupName(),
            ],
            'groups' => $this->resource->getGroups(),
        ];
    }
}
