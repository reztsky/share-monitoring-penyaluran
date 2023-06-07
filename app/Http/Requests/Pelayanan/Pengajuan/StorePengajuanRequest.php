<?php

namespace App\Http\Requests\Pelayanan\Pengajuan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePengajuanRequest extends FormRequest
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
            'nik'=>'required|numeric|digits:16|unique:pengajuan_kebutuhans,nik',
            'no_kk'=>'required|numeric|digits:16',
            'nama'=>'required',
            'jenis_kelamin'=>[
                'required',
                Rule::in(['P','L'])
            ],
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required|date|before:tomorrow',
            'kecamatan'=>'required',
            'kelurahan'=>'required',
            'rw'=>'required|numeric',
            'rt'=>'required|numeric',
            'alamat'=>'required',
            'no_hp'=>'required|numeric',
            'id_jenis_kebutuhan'=>'required|numeric',
            'status_pengajuan'=>'required|numeric|max:3',
            'dokumentasi'=>'image|max:2048',
            'tanggal_pengajuan'=>'required|date|',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'status_pengajuan'=>3
        ]);
    }
}
