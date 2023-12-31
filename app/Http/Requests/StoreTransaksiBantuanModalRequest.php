<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransaksiBantuanModalRequest extends FormRequest
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
            'id_kpm'=>'required|numeric|exists:kpm_bantuan_modals,id',
            'ba_kpm'=>'nullable|max:2048|mimes:pdf',
            'ba_kecamatan'=>'nullable|max:2048|mimes:pdf',
            'foto_kpm'=>'nullable|image|max:2048',
            'foto_pemberian.*'=>'required|image',
            'foto_pemberian'=>'array',
        ];
    }
}
