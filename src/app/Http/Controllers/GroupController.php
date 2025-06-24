<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use packages\Usecase\Interfaces\Groups\GetGroupsUseCaseInterface;
use packages\Presenter\Resources\Groups\GroupResource;

class GroupController extends Controller
{
    public function __construct(private GetGroupsUseCaseInterface $useCase) {}

    /**
     * グループ情報を全て取得
     *
     * @return JsonResponse
     */
    public function getGroups(): JsonResponse
    {
        $groups = $this->useCase->handle();
        return response()->json(GroupResource::collection($groups));
    }
}
