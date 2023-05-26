<?php

namespace App\Http\Requests\Pelayanan\Penyaluran;

use Illuminate\Foundation\Http\FormRequest;

class CreatePenyaluranRequest extends FormRequest
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
            'id_pengajuan'=>'required',
            'bap'=>'required|mimes:pdf|max:5000',
            'foto_penyaluran'=>'required|image|max:2048',
        ];
    }
}