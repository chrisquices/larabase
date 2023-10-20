<?php

namespace App\Http\Requests\Backend\UserManagement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest {


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array {
        return [
            'name'      => 'required|max:255',
            'last_name' => 'required|max:255',
            'email'     => 'required|max:255|email|' . Rule::unique('users')->ignore($this->route('user')),
            'password'  => 'sometimes|max:255|confirmed',
            'photo'     => 'max:4096|mimes:jpg,jpeg,png',
            'is_active' => 'required',
        ];
    }

}
