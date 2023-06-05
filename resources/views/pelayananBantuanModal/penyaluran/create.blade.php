@extends('layout')
@section('link-active-pelayanan-modal', 'active')
@section('content')
    <div class="app-card-body">
        <div class="row">
            <div class="col-12">
                <h3 class="app-page-title">Upload Bukti Penyaluran Alat Bantu Disabilitas</h3>
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('pelayanan.penyaluran.index') }}" class="btn px-2 py-1"
                        style="background-color: #BC4C4C;color:white;width:100px">Kembali</a>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row app-card shadow-sm bg-white p-3">
                    <div class="app-card-body">
                        <div class="g-3">
                            <h5 class="mb-4">DATA PENERIMA</h5>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">NIK</label>
                                <div class="col-sm-8">
                                    {{ $pengajuan_kebutuhan->nik }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">No. KK</label>
                                <div class="col-sm-8">
                                    {{ $pengajuan_kebutuhan->no_kk }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Nama Penerima</label>
                                <div class="col-sm-8">
                                    {{ $pengajuan_kebutuhan->nama }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8 pt-2">
                                    {{ $pengajuan_kebutuhan->jenis_kelamin }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">
                                    {{ $pengajuan_kebutuhan->tempat_lahir }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    {{ $pengajuan_kebutuhan->tanggal_lahir }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Kecamatan</label>
                                <div class="col-sm-8">
                                    {{ $pengajuan_kebutuhan->kecamatan }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Kelurahan</label>
                                <div class="col-sm-8">
                                    {{ $pengajuan_kebutuhan->kelurahan }}
                                </div>
                            </div>
                            <div class="row mt-6">
                                <label for="" class="col-sm-4 col-form-label">RW</label>
                                <div class="col-sm-8">
                                    {{ $pengajuan_kebutuhan->rw }}
                                </div>
                            </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">RT</label>
                                    <div class="col-sm-8">
                                        {{ $pengajuan_kebutuhan->rt }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                                    <div class="col-sm-8">
                                        {{ $pengajuan_kebutuhan->alamat }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label fw-bold">No. Hp</label>
                                    <div class="col-sm-8">
                                        {{ $pengajuan_kebutuhan->no_hp }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">Jenis Alat Bantu
                                        Disabilitas</label>
                                    <div class="col-sm-8">
                                        {{ $pengajuan_kebutuhan->kebutuhan->nama_kebutuhan }}
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <form action="{{ route('pelayanan.penyaluran.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_pengajuan" value="{{ $pengajuan_kebutuhan->id }}">
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">Tanggal Salur</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" value="{{ old('tanggal_salur') }}"
                                            id="tanggal_salur" placeholder="tanggal_salur" name="tanggal_salur">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">Sumber Dana</label>
                                    <div class="col-sm-8">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="KEMENSOS" id="1"
                                                name="sumber_dana">
                                            <label class="form-check-label" id="sumber_dana" for="1">KEMENSOS</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sumber_dana" value="APBD"
                                                id="2">
                                            <label class="form-check-label" id="sumber_dana" for="2">APBD</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sumber_dana" value="BASNAS"
                                                id="3">
                                            <label class="form-check-label" id="sumber_dana" for="3">BAZNAS</label>
                                        </div>
                                        <div class="form-check align-self-center">
                                            <input class="form-check-input" type="radio" name="sumber_dana"
                                                value="LAINNYA" id="4"
                                                onmousedown="this.form.sumber_dana_lainnya.disabled=this.checked">
                                            <input type="text" class="form-control" name="sumber_dana_lainnya"
                                                id="sumber_dana" for="3" placeholder="LAINNYA" disabled>
                                            @error('sumber_dana_lainnya')
                                                <div class="form-text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @error('sumber_dana')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">Dokumentasi Penyaluran</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="foto_penyaluran"
                                            id="foto_penyaluran" accept="image/*" style="min-height:45px">
                                            <div class="form-text" style="color: crimson">Format File : jpg, jpeg, png</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">BAP Penyaluran</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="bap" id="bap"
                                            accept="pdf/*" style="min-height:45px">
                                            <div class="form-text" style="color: crimson">Format File : pdf</div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button class="btn btn-success px-3 py-1">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
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

        const foto_penyaluran = document.getElementById('foto_penyaluran')

        foto_penyaluran.addEventListener('change', (ev) => {
            const file = ev.target.files[0]; // get the file
            const blobURL = URL.createObjectURL(file);
            const img = new Image();

            img.src = blobURL

            img.onerror = () => {
                URL.revokeObjectURL(this.src)
                alert('Cannot Load Image');
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

                        const newImage = new File([blob], file.name)
                        const dataTransfer = new DataTransfer()
                        dataTransfer.items.add(newImage)
                        //set image to input file data_compressed
                        document.getElementById('foto_penyaluran').files = dataTransfer.files
                    },
                    MIME_TYPE,
                    QUALITY
                );

                // document.getElementById("root").append(canvas);
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
