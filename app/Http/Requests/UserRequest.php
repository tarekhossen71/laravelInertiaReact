<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    protected $rules;
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
        // dd(request()->all());
        $rules = [
            'name'                  => ['nullable','string','max:20'],
            'email'                 => ['nullable','email'],
            'role_id'               => ['nullable','integer'],
            'mobile_no'             => ['nullable','string'],
            'avatar'                => ['nullable','image'],
            'gender'                => ['nullable','integer'],
        ];

        if (!request()->update_id) {
            // store/create
            $rules['password'] = ['required','string','min:8','confirmed'];
            $rules['password_confirmation'] = ['required_with:password','same:password'];
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // update
            $rules['password'] = ['nullable','string','min:8','confirmed'];
            $rules['password_confirmation'] = ['nullable','same:password'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'role_id.required' => 'The role field is required.',
        ];
    }
}
