<?php

namespace App\Http\Requests\frontOffice;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
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
            'terrain_id' => 'required|exists:terrains,id',
            'commentaire' => 'required|string|max:1000',
            'note' => 'required|integer|min:1|max:5',
        ];
    }
}
