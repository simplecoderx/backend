<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if (request()->routeIs('user.login')) {
            return [
                'email' => 'required|string|email|max:255',
                'password' => 'required|min:8',
            ];
        } else if (request()->routeIs('user.store')) { //Kini na validation magamit rani if kaning user.store and e-hit nga url
            return [
                'name' => 'required | string | max:255',
                'email' => 'required | string | email |max:255 | unique:App\Models\User,email',
                'password' => 'required | min:8',
            ];
        } else if (request()->routeIs('user.update')) { //Kini na validation magamit rani if kaning user.store and e-hit nga url
            return [
                'name' => 'required | string | max:255', //since si name raman tung e-update natu
            ];
        } else if (request()->routeIs('user.email')) { //Kini na validation magamit rani if kaning user.store and e-hit nga url
            return [
                'email' => 'required | string | email |max:255 ', //since si email nasab tung e-update natu
            ];
        } else if (request()->routeIs('user.password')) { //Kini na validation magamit rani if kaning user.store and e-hit nga url
            return [
                'password' => 'required | confirmed | min:8', //since si password nasab tung e-update natu
            ];
        } else if (request()->routeIs('user.image') || request()->routeIs('profile.image') || request()->routeIs('ocr.image')) {
            return [
                'image' => 'required|image|mimes:jpg,bmp,png|max:2048',
            ];
        } else if (request()->routeIs('user.prompt')) {
            return [
                'tools_type' => 'required|string',
                'text' => 'required|string',
                'result' => 'nullable|string'
            ];
        } else if (request()->routeIs('user.storetransprompt')) {
            return [
                'text' => 'required|string',
                'result' => 'nullable|string'
            ];
        }
    }
}
