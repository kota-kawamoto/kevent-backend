<?php

namespace packages\Infrastructure\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use packages\Core\Exceptions\NotFoundException;
use packages\Domain\Models\Pagination\UserPagination;
use packages\Domain\Models\User as DomainUser;
use packages\Domain\Repositories\UserRepositoryInterface;
use packages\Infrastructure\Eloquent\Models\User;

/**
 * ユーザ Repository 実装クラス
 * @package packages\Infrastructure\Repositories
 */
class UserRepository implements UserRepositoryInterface
{
    /**
     * @param int $id
     * @return DomainUser
     */
    public function find(int $id): DomainUser
    {
        $user = User::query()->find($id);
        if (empty($user)) {
            throw new NotFoundException('該当するユーザーが存在しません');
        }

        return $user->buildDomainModel();
    }

    /**
     * @param array $params
     * @return UserPagination
     */
    public function index(array $params): UserPagination
    {
        $builder = User::query();

        if (isset($params['name'])) {
            $builder->where('name', 'like', '%' . $params['name'] . '%');
        }

        if (isset($params['login_id'])) {
            $builder->where('login_id', 'like', '%' . $params['login_id'] . '%');
        }

        if (isset($params['role_type'])) {
            $builder->where('type_id', $params['role_type']);
        }

        /** @var LengthAwarePaginator */
        $result = $builder->orderByDesc('id')->paginate(10, ['*'], 'page', $params['page'] ?? 1);

        $collection = new Collection();

        /** @var User */
        foreach ($result->items() as $item) {
            $collection->push($item->buildDomainModel());
        }

        return UserPagination::reconstruct(
            total: $result->total(),
            currentPage: $result->currentPage(),
            lastPage: $result->lastPage(),
            data: $collection
        );
    }

    /**
     * @param integer $id
     * @param array $data
     * @return void
     */
    public function update(int $id, array $data): void
    {
        $user = User::query()->find($id);

        if (empty($user)) {
            throw new NotFoundException('該当するユーザーが存在しません');
        }

        $user->update($data);
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $user = User::query()->find($id);

        if (empty($user)) {
            throw new NotFoundException('該当するユーザーが存在しません');
        }

        $user->delete();
    }
}
