<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:18',
            'login_id' => 'required|string|max:30|unique:users,login_id,' . $this->id . ',id',
            'group_id' => 'required|exists:groups,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '名前は必須です',
            'name.max' => '名前は18文字以内で入力してください',
            'login_id.required' => 'ログインIDは必須です',
            'login_id.unique' => 'このログインIDは既に使用されています',
            'login_id.max' => 'ログインIDは30文字以内で入力してください',
            'group_id.required' => 'グループは必須です',
            'group_id.exists' => '選択されたグループは存在しません',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
