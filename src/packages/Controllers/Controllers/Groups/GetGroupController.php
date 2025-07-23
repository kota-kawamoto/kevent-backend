<?php

namespace packages\Controllers\Controllers\Groups;

use Illuminate\Http\JsonResponse;
use packages\Usecase\Interfaces\Groups\GetGroupsUseCaseInterface;
use packages\Presenter\Resources\Groups\GetGroupResource;

class GetGroupController
{
    public function __construct(private GetGroupsUseCaseInterface $useCase) {}

    /**
     * グループ情報を全て取得
     *
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $groups = $this->useCase->handle();
        return response()->json(GetGroupResource::collection($groups));
    }
}
