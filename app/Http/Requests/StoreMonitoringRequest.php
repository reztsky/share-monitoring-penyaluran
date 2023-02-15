<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class StoreMonitoringRequest extends FormRequest
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
        $rules=[
            'inserted_by'=>'required|numeric|min:1',
            'id_kpm_modal'=>'required|numeric|',
            'alamat_tempat_usaha'=>'required',
            'jenis_bantuan_modal'=>'required',
            'no_hp'=>'required',
            'pengelolaan_usaha'=>'required|numeric|min:1|max:2',
            'bentuk_usaha'=>'required|numeric|min:1|max:2',
            'penggunaan_bantuan'=>'required|numeric|min:1|max:3',
            'alasan_pengunaan_bantuan'=>'required_if:penggunaan_bantuan,3|nullable',
            'penghasilan_sebulan'=>'required',
            'kegunaan_hasil_usaha'=>'required',
            'kendala'=>'required',
            'harapan'=>'required',
        ];
        $validationByJenisModal=$this->validationByJenisModal();
        $rules=$rules+$validationByJenisModal;
        
        return $rules;
    }

    protected function prepareForValidation(){
        return $this->merge([
            'inserted_by'=>Auth::user()->id,
        ]);
    }

    private function validationByJenisModal(){
        $jenis_bantuan_modal=$this->jenis_bantuan_modal;

        if($jenis_bantuan_modal=='MENJAHIT'){
            return [
                'jahitan_dalam_sebulan'=>'required|numeric'
            ];
        }

        if($jenis_bantuan_modal=='CUCI KENDARAAN'){
            return [
                'kendaraan_dicuci_sebulan'=>'required|numeric',
                'harga_cuci'=>'required|numeric',
            ];
        }

        if($jenis_bantuan_modal=='KOPI KELILING'){
            return [
                'lebih_banyak_kopi_teh'=>'required|numeric|min:1|max:2',
                'harga_jual_kopi'=>'required|numeric',
                'harga_jual_teh'=>'required|numeric',
            ];
        }

        if($jenis_bantuan_modal=='LAUNDRY'){
            return [
                'harga_cuci_kering'=>'required|numeric',
                'harga_cuci_basah'=>'required|numeric',
                'harga_cuci_setrika'=>'required|numeric',
                'harga_setrika'=>'required|numeric',
            ];
        }

        if($jenis_bantuan_modal=='WARUNG KOPI'){
            return [
                'lebih_banyak_kopi_teh'=>'required|numeric|min:1|max:2',
                'harga_jual_kopi'=>'required|numeric',
                'harga_jual_teh'=>'required|numeric',
            ];
        }

        if($jenis_bantuan_modal=='TOKO KELONTONG'){
            return [
                'nama_barang.*'=>'required',
                'jumlah_awal.*'=>'required',
                'jumlah_saat_ini.*'=>'required',
                'harga.*'=>'required|numeric',
                'catatan'=>'required',
            ];
        }
    }
}
