<?php

namespace packages\Controllers\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use packages\Domain\Models\Enums\UserRoleType;

/**
 * ユーザ一覧 FormRequest クラス
 * @package packages\Controllers\Requests\Users
 */
class IndexUserRequest extends FormRequest
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
            'name'      => 'nullable|string|max:255',
            'login_id'  => 'nullable|string|max:255',
            'role_type' => ['nullable' , Rule::enum(UserRoleType::class)],
            'page'      => 'nullable|integer|min:1',
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
            'role_type' => '権限',
            'page'      => 'ページ番号',
        ];
    }
}
