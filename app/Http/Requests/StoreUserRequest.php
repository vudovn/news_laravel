<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users', 
            'password'=> 'required|min:5',
            'password_c' => 'required|same:password',
            'status' => 'required',
            'role' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Trường họ và tên không đc để trống',
            'email.required' => 'Trường email không đc để trống',
            'email.email' => 'Email chưa đúng định dạng',
            'email.unique' => 'Email đã được sữ dụng',
            'password.required' => 'Trường mật khẩu không đc để trống',
            'password.min' => 'Độ dài mật khẩu tối thiểu 5 ký tự',
            'password_c.required' => 'Trường mật khẩu xác nhận ko đc để trống',
            'password_c.same' => 'Mật khẩu xác nhận không trùng khớp',
            'status.required' => 'Chưa chọn trạng thái thành viên',
            'role.required' => 'Chưa chọn quyền hạn thành viên',
        ];
    }
}
