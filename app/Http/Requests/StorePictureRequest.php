<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePictureRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cambiar a `return auth()->check();` si requiere autenticación
    }

    public function rules()
    {
        return [
            'title' => 'sometimes|string|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,webp|max:12288',
            'description_picture' => 'sometimes|nullable|string',
            'album_id'=> 'sometimes|exists:album,id_album',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'La imagen es obligatoria',
            'image.max' => 'La imagen no debe superar 12MB',
        ];
    }
}
