<?php

namespace packages\UseCase\Interactors\Users;

use packages\Domain\Models\EditUserData;
use packages\Domain\Models\Enums\Group;
use packages\Domain\Repositories\UserRepositoryInterface;
use packages\UseCase\Interfaces\Users\EditUserUseCaseInterface;

/**
 * ユーザ編集画面 UseCase 実装クラス
 * @package packages\UseCase\Interactors\Users
 */
class EditUserInteractor implements EditUserUseCaseInterface
{
    public function __construct(private UserRepositoryInterface $repository) {}

    /**
     * @param int $id
     * @return EditUserData
     */
    public function handle(int $id): EditUserData
    {
        $user = $this->repository->find($id);

        // グループ情報を取得
        $groups = [];
        foreach (Group::cases() as $group) {
            $groups[] = [
                'id' => $group->value,
                'name' => $group->label(),
            ];
        }

        return EditUserData::reconstruct($user, $groups);
    }
}
