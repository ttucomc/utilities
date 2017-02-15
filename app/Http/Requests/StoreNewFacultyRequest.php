<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewFacultyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Handled by Admin middleware
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'eraiderID'     => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|unique:teams,email',
            'title'         => 'required',
            'department'    => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'eraiderID.required' => 'The eraiderID field is required.'
        ];
    }
}
