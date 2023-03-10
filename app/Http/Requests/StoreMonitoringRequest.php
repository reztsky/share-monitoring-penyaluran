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
        $rules_required=[
            'inserted_by'=>'required|numeric|min:1',
            'id_kpm_modal'=>'required|numeric|',
            'alamat_tempat_usaha'=>'required',
            'jenis_bantuan_modal'=>'required',
            'no_hp'=>'required',
            'status_penggunaan_bantuan'=>'required|numeric'
        ];

        $rules_optional_1=[
            'status_penggunaan_bantuan'=>'required|numeric',
            'pengelolaan_usaha'=>'numeric|min:1|max:2|',
            'bentuk_usaha'=>'numeric|min:1|max:2|',
            'penggunaan_bantuan'=>'numeric|min:1|max:3|',
            'penghasilan_sebulan'=>'numeric|min:1|max:6|',
            'kegunaan_hasil_usaha'=>'array|min:1|',
            'kendala'=>'required',
            'harapan'=>'required',
            'dokumentasi'=>'required|image|max:5120'
        ];

        $rules_optional_2=[
            'alasan_pengunaan_bantuan'=>'nullable',
            'kendala'=>'required',
            'harapan'=>'required',
            'dokumentasi'=>'required|image|max:5120'
        ];

        $validationByJenisModal=$this->validationByJenisModal();
        $rules=$rules_required+$rules_optional_1+$validationByJenisModal;
        $rules_2=$rules_required+$rules_optional_2;

        if($this->status_penggunaan_bantuan==2){
            return $rules_2;
        }else if($this->status_penggunaan_bantuan==1){
            return $rules;
        }
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
                'nama_barang.*'=>'required',
                'jumlah_awal.*'=>'required',
                'jumlah_terjual.*'=>'required',
                'harga.*'=>'required|numeric',
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
                'nama_barang.*'=>'required',
                'jumlah_awal.*'=>'required',
                'jumlah_terjual.*'=>'required',
                'harga.*'=>'required|numeric',
            ];
        }

        if($jenis_bantuan_modal=='TOKO KELONTONG'){
            return [
                'nama_barang.*'=>'required',
                'jumlah_awal.*'=>'required',
                'jumlah_terjual.*'=>'required',
                'harga.*'=>'required|numeric',
            ];
        }
    }
}
