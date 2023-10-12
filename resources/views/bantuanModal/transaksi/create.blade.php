@extends('layout')
@section('link-active-bantuan-modal', 'active')
@section('link-active-bantuan-modal-transaksi', 'active')
@push('style')
    <style>
        .button {
            width: 200px;
            height: 35px;
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            /* letter-spacing: 2.5px; */
            font-weight: 500;
            color: white;
            background-color: #5EC2AF;
            border: none;
            border-radius: 45px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
            text-align: center;
        }

        .button:hover {
            box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
            color: ##747B80;
            transform: translateY(-7px);
        }

        .white,
        .white a {
            color: #fff;
        }

        th {
            cursor: pointer;
        }
    </style>
@endpush
@section('content')
    <div class="col-md-12 col-sm-12 col-12">
        <div class="bg-white shadow p-3 rounded-3 my-3">
            <dl class="row">
                @foreach ($kpm->toArray() as $key => $value)
                    @continue(in_array($key, ['id','transaksi', 'status_aktif', 'kelurahan','opd_verif_pimpinan','opd_asal','keterangan_simbolis','tanggal_terima_kecamatan','tahap']))

                    <dt class="col-md-2 col-12">{{ Str::upper(str_replace('_', ' ', $key)) }}</dt>
                    <dl class="col-md-10 col-12">{{ Str::upper($value) }}</dl>
                @endforeach
                @if (!is_null($kpm->transaksi))
                    <dt class="col-md-2 col-12">DI ENTRY PADA</dt>
                    <dl class="col-md-10 col-12">{{ $kpm->transaksi->updated_at }}</dl>
                    <dt class="col-md-2 col-12">BA. KECAMATAN</dt>
                    <dl class="col-md-10 col-12"> <a target="_blank" href="{{asset('storage/ba_kecamatan/'.$kpm->transaksi->ba_kecamatan)}}">{{$kpm->transaksi->ba_kecamatan}}</a></dl>
                    <dt class="col-md-2 col-12">BA. KPM</dt>
                    <dl class="col-md-10 col-12"><a target="_blank" href="{{asset('storage/ba_kpm/'.$kpm->transaksi->ba_kpm)}}">{{$kpm->transaksi->ba_kpm}}</a></dl>
                    <dt class="col-md-2 col-12">FOTO PEMBERIAN</dt>
                    <dl class="col-md-10 col-12">
                        @foreach ($kpm->transaksi->foto_pemberian as $foto)
                            <img src="{{ asset('storage/foto_pemberian/' . $foto) }}" alt="" class="img-thumbnail"
                                style="max-width:200px;max-height:200px;object-fit:cover">
                        @endforeach
                    </dl>
                @endif
            </dl>

            <div class="d-flex">
                <div class="col-md-12 col-12">
                    <form action="{{ route('bantuanmodal.transaksi.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_kpm" value="{{ $kpm->id }}">

                        <div class="mb-2">
                            <label for="" class="form-label">BA KPM</label>
                            <input type="file" class="form-control" name="ba_kpm" id="ba_kpm">
                            @error('ba_kpm')
                                <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label">BA Kecamatan</label>
                            <input type="file" class="form-control" name="ba_kecamatan" id="ba_kecamatan">
                            @error('ba_kecamatan')
                                <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label">Foto Pemberian</label>
                            <input type="file" class="form-control" name="" id="foto_pemberian" accept="image/*"
                                multiple>
                            @error('foto_pemberian')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                            @error('id_kpm')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        

                        <div id="root" class="d-none"></div>
                        <div class="d-flex justify-content-end gap-2">
                            @if (!is_null($kpm->transaksi))
                                <a href="{{ route('bantuanmodal.transaksi.softDelete', $kpm->transaksi->id) }}"
                                    id="btn-delete" class="btn btn-danger btn-sm">Batalkan</a>
                            @endif
                            <button class="btn-sm btn-success btn" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        // Delete Alert Confirmation
        const btn_delete = document.getElementById('btn-delete');
        btn_delete.addEventListener('click', (ev) => {
            if (!confirm('Apakah Yakin Ingin Membatalkan Transaksi ?')) ev.preventDefault()
        })
    </script>

    <script>
        const MAX_WIDTH = 1200;
        const MAX_HEIGHT = 1200;
        const MIME_TYPE = "image/jpeg";
        const QUALITY = 0.7;

        const foto_pemberian = document.getElementById('foto_pemberian')
        const images = [];
        foto_pemberian.addEventListener('change', (ev) => {
            var coba = [];
            document.getElementById('root').html = ''
            for (let index = 0; index < foto_pemberian.files.length; index++) {
                const file = foto_pemberian.files[index]; // get the file
                const blobURL = URL.createObjectURL(file);
                const img = new Image();

                img.src = blobURL

                img.onerror = () => {
                    URL.revokeObjectURL(this.src)
                    alert('Gagal Load Gambar');
                }

                img.onload = function() {

                    URL.revokeObjectURL(this.src)
                    const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
                    const canvas = document.createElement("canvas");
                    canvas.width = newWidth;
                    canvas.height = newHeight;

                    const ctx = canvas.getContext("2d");
                    ctx.drawImage(img, 0, 0, newWidth, newHeight);
                    canvas.toBlob(
                        (blob) => {
                            const dt = new DataTransfer();
                            const imageNew = new File([blob], file.name)
                            dt.items.add(imageNew)
                            var template =
                                `<input type="file" name="foto_pemberian[]" id="compress-foto-${index}" multiple>`
                            document.getElementById('root').insertAdjacentHTML('afterbegin', template)
                            document.getElementById(`compress-foto-${index}`).files = dt.files
                        },
                        MIME_TYPE,
                        QUALITY
                    );
                }
            }


        })


        function calculateSize(img, maxWidth, maxHeight) {
            let width = img.width;
            let height = img.height;

            // calculate the width and height, constraining the proportions
            if (width > height) {
                if (width > maxWidth) {
                    height = Math.round((height * maxWidth) / width);
                    width = maxWidth;
                }
            } else {
                if (height > maxHeight) {
                    width = Math.round((width * maxHeight) / height);
                    height = maxHeight;
                }
            }
            return [width, height];
        }

        // Utility functions for demo purpose

        function displayInfo(label, file) {
            const p = document.createElement('p');
            p.innerText = `${label} - ${readableBytes(file.size)}`;
            document.getElementById('root').append(p);
        }

        function readableBytes(bytes) {
            const i = Math.floor(Math.log(bytes) / Math.log(1024)),
                sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

            return (bytes / Math.pow(1024, i)).toFixed(2) + ' ' + sizes[i];
        }
    </script>
@endpush
