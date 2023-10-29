<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UserStoreRequest extends FormRequest {


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return Gate::allows('create_users');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array {
        return [
            'locale_id' => 'required|int|max:255|exists:locales,id',
            'name'      => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email'     => 'required|string|max:255|email|unique:users',
            'password'  => 'required|string|max:255|confirmed',
            'is_active' => 'required|boolean|max:255',
            'is_admin'  => 'required|boolean|max:255',
            'role_ids'  => 'required|array'
        ];
    }

}
