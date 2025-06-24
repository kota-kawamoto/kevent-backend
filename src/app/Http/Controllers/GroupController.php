<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use packages\Domain\Models\Enums\Group;

class GroupController extends Controller
{
    /**
     * グループ情報を全て取得
     *
     * @return JsonResponse
     */
    public function getGroups(): JsonResponse
    {
        $groups = [];
        foreach (Group::cases() as $group) {
            $groups[] = [
                'id' => $group->value,
                'name' => $group->label(),
            ];
        }
        return response()->json($groups);
    }
}
