<div class="g-3">
    <h5 class="mb-4">Lain - Lain</h5>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label">Kendala</label>
        <div class="col-sm-8">
            <textarea name="kendala" id="" cols="30" rows="10" class="form-control" placeholder="Kendala"
                style=" min-height:100px;max-height:100px"></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-4 col-form-label">Harapan Untuk pengembangan Modal Usaha kedepannya</label>
        <div class="col-sm-8">
            <textarea name="harapan" id="" cols="30" rows="10" class="form-control" placeholder="Harapan"
                style=" min-height:100px;max-height:100px"></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-4 col-form-label">Dokumentasi</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" name="dokumentasi" id="dokumentasi">
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <button class="btn btn-success px-3 py-1">Simpan</button>
    </div>
</div>
@push('script')
<script>
    const MAX_WIDTH = 1000;
    const MAX_HEIGHT = 1000;
    const MIME_TYPE = "image/jpeg";
    const QUALITY = 0.7;
    
    const foto_pengambilan=document.getElementById('dokumentasi')
    
    foto_pengambilan.addEventListener('change',(ev)=>{
        const file = ev.target.files[0]; // get the file
        const blobURL = URL.createObjectURL(file);
        const img = new Image();
    
        img.src=blobURL
    
        img.onerror=()=>{
            URL.revokeObjectURL(this.src)
            alert('Cannot Load Image');
        }
    
        img.onload=function(){
            URL.revokeObjectURL(this.src)
            const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
            const canvas = document.createElement("canvas");
            canvas.width = newWidth;
            canvas.height = newHeight;
            
            const ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0, newWidth, newHeight);
            canvas.toBlob(
                (blob) => {
    
                    const newImage=new File([blob],file.name)
                    const dataTransfer=new DataTransfer()
                    dataTransfer.items.add(newImage)
                    //set image to input file data_compressed
                    document.getElementById('dokumentasi').files=dataTransfer.files
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