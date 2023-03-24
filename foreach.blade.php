{{-- @forelse ($monitorings as $key=>$monitoring)
    @continue($key=='penghasilan_sebulan')
    <tr>
        <td>{{$monitorings->firstItem()+$loop->index}}</td>
        <td>{{$monitoring->kpm->nama}}</td>
        <td>{{$monitoring->kpm->jenis_bantuan_modal}}</td>
        @php
        $penghasilan_sebulan=$monitorings['penghasilan_sebulan']->where('id_kpm_modal',$monitoring->id_kpm_modal);
        @endphp

        <td>{{is_null($penghasilan_sebulan->where('bulan',1)->first()) ? '-' :
            $penghasilan_sebulan->where('bulan',1)->first()->penghasilan_sebulan}}</td>
        <td>{{is_null($penghasilan_sebulan->where('bulan',2)->first()) ? '-' :
            $penghasilan_sebulan->where('bulan',2)->first()->penghasilan_sebulan}}</td>
        <td>{{is_null($penghasilan_sebulan->where('bulan',3)->first()) ? '-' :
            $penghasilan_sebulan->where('bulan',3)->first()->penghasilan_sebulan}}</td>
        <td>{{is_null($penghasilan_sebulan->where('bulan',4)->first()) ? '-' :
            $penghasilan_sebulan->where('bulan',4)->first()->penghasilan_sebulan}}</td>
        <td>{{is_null($penghasilan_sebulan->where('bulan',5)->first()) ? '-' :
            $penghasilan_sebulan->where('bulan',5)->first()->penghasilan_sebulan}}</td>
        <td>{{is_null($penghasilan_sebulan->where('bulan',6)->first()) ? '-' :
            $penghasilan_sebulan->where('bulan',6)->first()->penghasilan_sebulan}}</td>
        <td>{{is_null($penghasilan_sebulan->where('bulan',7)->first()) ? '-' :
            $penghasilan_sebulan->where('bulan',7)->first()->penghasilan_sebulan}}</td>
        <td>{{is_null($penghasilan_sebulan->where('bulan',8)->first()) ? '-' :
            $penghasilan_sebulan->where('bulan',8)->first()->penghasilan_sebulan}}</td>
        <td>{{is_null($penghasilan_sebulan->where('bulan',9)->first()) ? '-' :
            $penghasilan_sebulan->where('bulan',9)->first()->penghasilan_sebulan}}</td>
        <td>{{is_null($penghasilan_sebulan->where('bulan',10)->first()) ? '-' :
            $penghasilan_sebulan->where('bulan',10)->first()->penghasilan_sebulan}}</td>
        <td>{{is_null($penghasilan_sebulan->where('bulan',11)->first()) ? '-' :
            $penghasilan_sebulan->where('bulan',11)->first()->penghasilan_sebulan}}</td>
        <td>{{is_null($penghasilan_sebulan->where('bulan',12)->first()) ? '-' :
            $penghasilan_sebulan->where('bulan',12)->first()->penghasilan_sebulan}}</td>
        <td>{{is_null($penghasilan_sebulan->where('bulan',12)->first()) ? '-' :
            $penghasilan_sebulan->where('bulan',12)->first()->penghasilan_sebulan}}</td>
    </tr>
    @empty
    <tr>
        <td colspan="5">No Found Record</td>
    </tr>
    @endforelse --}}