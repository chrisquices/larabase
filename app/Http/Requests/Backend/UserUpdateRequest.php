<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest {


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return Gate::allows('edit_users');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array {
        return [
            'locale_id' => 'required|int|max:255|exists:locales,id',
            'name'      => 'required|max:255',
            'last_name' => 'required|max:255',
            'email'     => 'required|max:255|email|' . Rule::unique('users')->ignore($this->route('user')),
            'password'  => 'sometimes|max:255|confirmed',
            'photo'     => 'max:4096|mimes:jpg,jpeg,png',
            'is_active' => 'required',
            'is_admin'  => 'required|boolean|max:255',
            'role_ids'  => 'required|array'
        ];
    }

}
