<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlbumRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cambiar a `return auth()->check();` si requiere autenticación
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:12288',
            'description_album' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'La imagen es obligatoria',
            'image.max' => 'La imagen no debe superar 2MB',
        ];
    }
}
