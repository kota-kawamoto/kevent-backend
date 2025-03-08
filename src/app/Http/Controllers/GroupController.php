<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;

class GroupController extends Controller
{

    /**
     * グループ情報を全て取得
     *
     * @return JsonResponse
     */
    public function getGroups(): JsonResponse
    {
        try {
            $groups = Group::all();
            return response()->json($groups);
        } catch (\Exception $e) {
            Log::error('Error', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'group not found'], 404);
        }
    }



}
