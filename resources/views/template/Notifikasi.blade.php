@if ($message=session('notifikasi'))
<div class="toast-container position-absolute p-3 top-0 end-0" style="z-index:999999;">
    <div class="toast show align-items-center text-white border-0" style="background-color: #5EC2AF" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{$message}}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
@endif
