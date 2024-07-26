<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThanhVienRequest extends FormRequest
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
            'nhan_vien_id' => 'required|unique:thanh_viens,nhan_vien_id',
            'phan_viec' => 'required'
        ];
    }
    function messages()
    {
        return [
            'nhan_vien_id.unique' => 'Nhân viên đã được thêm vào nhóm trước đó'
        ];
    }
}
