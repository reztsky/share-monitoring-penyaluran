<?php

namespace App\Http\Requests\Pelayanan\Pemeriksaan;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePemeriksaanRequest extends FormRequest
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
            'verifikasi'=>'required|numeric|max:2|min:0',
            'bap'=>'required_if:verifikasi,1|mimes:pdf|max:5000',
        ];
    }

    public function messages()
    {
        return[
            'bap.required_if'=>'BAP Wajib Diisi Jika Verifikasi Disetujui',
            'bap.mimes'=>'File BAP Wajib PDF',
            'bap.max'=>'File BAP Max. Sebesar 5MB',
        ];
    }
}
