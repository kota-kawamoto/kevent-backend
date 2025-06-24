<?php

namespace packages\UseCase\Interactors\Users;

use packages\Domain\Repositories\UserRepositoryInterface;
use packages\UseCase\Interfaces\Users\UpdateUserUseCaseInterface;
use Illuminate\Support\Facades\Hash;

/**
 * ユーザ更新 UseCase 実装クラス
 * @package packages\UseCase\Interactors\Users
 */
class UpdateUserInteractor implements UpdateUserUseCaseInterface
{
    public function __construct(private UserRepositoryInterface $repository) {}

    /**
     * @param integer $id
     * @param array $data
     * @return void
     */
    public function handle(int $id, array $data): void
    {
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }
        $this->repository->update($id, $data);
    }
}
