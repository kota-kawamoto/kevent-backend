<?php

namespace packages\Usecase\Interactors\Groups;

use packages\Usecase\Interfaces\Groups\GetGroupsUseCaseInterface;
use packages\Domain\Models\Enums\Group;

class GetGroupsInteractor implements GetGroupsUseCaseInterface
{
    public function handle(): array
    {
        $groups = [];
        foreach (Group::cases() as $group) {
            $groups[] = [
                'id' => $group->value,
                'name' => $group->label(),
            ];
        }
        return $groups;
    }
}
