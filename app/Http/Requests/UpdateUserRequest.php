<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|regex:/^[\p{L}\p{N}\s]+$/u',
            'email' => 'required|unique:users,email,'. $this->id,
            'role' => 'required',
            'status' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Trường họ và tên không đc để trống.',
            'name.regex' => 'Tên không được chứa ký tự đặc biệt.',
            'email.required' => 'Trường email không đc để trống.',
            'email.unique' => 'Địa chỉ email đã được sữ dụng.',
            'status.required'=> 'Trường trạng thái chưa được chọn.',
            'role.required'=> 'Trường quyền hạn chưa được chon.',
        ];
    }
}
