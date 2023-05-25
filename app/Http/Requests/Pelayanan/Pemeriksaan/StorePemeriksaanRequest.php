<?php

namespace App\Http\Requests\Pelayanan\Pemeriksaan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePemeriksaanRequest extends FormRequest
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
            'dokumentasi'=>'image|max:2048'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'status_pengajuan'=>3
        ]);
    }
}
