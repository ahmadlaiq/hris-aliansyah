<div class="modal modal-blur fade" id="modal-detail-{{ $letter->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Surat {{ $letter->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-label">Gambar Surat</div>
                        @if(in_array(pathinfo($letter->image, PATHINFO_EXTENSION), ['pdf', 'doc']))
                            <iframe src="{{ asset('storage/'.$letter->image) }}" width="100%" height="600px"></iframe>
                        @elseif(in_array(pathinfo($letter->image, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                            <img src="{{ asset('storage/'.$letter->image) }}" alt="Gambar" class="img-fluid">
                        @else
                            Tidak ada file yang valid
                        @endif
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-danger">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-cloud-download-fill" width="16" height="16" fill="currentColor" class="bi bi-cloud-download-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0m-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708z"/>
                          </svg>
                        Download
                    </button>
                </div>
        </div>
    </div>
</div>
