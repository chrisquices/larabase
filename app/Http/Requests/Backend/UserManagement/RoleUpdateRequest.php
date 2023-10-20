<?php

namespace App\Http\Requests\Backend\UserManagement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleUpdateRequest extends FormRequest {


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
            'name'           => 'required|max:255|' . Rule::unique('roles')->ignore($this->route('role')),
            'permission_ids' => 'required|array'
        ];
    }

}
