<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class VoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->type == 'customer';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'game_id' => 'required|exists:games,id',
            'number' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'game_id.required' => 'Could not get game id.',
            'game_id.exists' => 'Could not found game.',
            'number.required' => 'Please enter a number.',
            'number.numeric' => 'Please enter a valid number.',
        ];
    }
}
