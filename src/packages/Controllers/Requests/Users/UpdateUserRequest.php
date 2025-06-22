<?php

namespace packages\Controllers\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use packages\Domain\Models\Enums\Group;

/**
 * ユーザ更新 FormRequest クラス
 * @package packages\Controllers\Requests\Users
 */
class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'      => 'required|string|max:255',
            'login_id'  => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($this->route('id')),
            ],
            'group_id'  => ['required', 'integer', Rule::in(Group::values())],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function attributes()
    {
        return [
            'name'      => 'ユーザー名',
            'login_id'  => 'ログインID',
            'group_id'  => 'グループ',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function messages()
    {
        return [
            'name.required'     => 'ユーザー名は必須です',
            'name.max'          => 'ユーザー名は255文字以内で入力してください',
            'login_id.required' => 'ログインIDは必須です',
            'login_id.unique'   => 'このログインIDは既に使用されています',
            'login_id.max'      => 'ログインIDは255文字以内で入力してください',
            'group_id.required' => 'グループは必須です',
            'group_id.in'       => '選択されたグループは存在しません',
        ];
    }
}
