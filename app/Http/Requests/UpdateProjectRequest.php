<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                Rule::unique('projects')->ignore($this->project->id),
                'max:255'
            ],
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|exists:technologies,id',
            'tags' => 'nullable|exists:technologies,id',
            'cover_image' => 'nullable|max:512',
            'team' => 'nullable|max:255',
            'duration' => 'nullable|max:255',
            'description' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è richesto',
            'title.unique' => 'Il titolo è già presente nel database',
            'title.max' => 'Il titolo è troppo lungo',
            'cover_image.max' => 'La dimensione dell\'immagine è troppo grande',
            'team.max' => 'Il nome del team è troppo lungo',
            'duration.max' => 'La durata è troppo lunga'
        ];
    }
}
