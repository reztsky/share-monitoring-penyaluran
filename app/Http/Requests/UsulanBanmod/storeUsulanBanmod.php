<?php

namespace App\Http\Requests\UsulanBanmod;

use Illuminate\Foundation\Http\FormRequest;

class storeUsulanBanmod extends FormRequest
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
            'nik'=>'required|numeric|digits:16',
            'no_kk'=>'required|numeric|digits:16',
            'nama'=>'required',
            'alamat'=>'required',
            'rt'=>'required|numeric',
            'rw'=>'required|numeric',
            'kecamatan'=>'required',
            'kelurahan'=>'required',
            'jenis_bantuan_modal'=>'required',
            'tahun_anggaran'=>'required|numeric|digits:4',
        ];
    }
}
