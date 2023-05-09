<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromptsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        if (request()->routeIs('user.store') ) {
            return [
                'tools_type' => 'required|string',
                'text' => 'required|string',
                'result' => 'required|string',
                'user_id' => 'required|exists:users,id'
            ];
        }
    }
}
