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
                        <img src="{{ asset('storage/'.$letter->image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" name="example-text-input"
                            placeholder="Judul" value="{{ $letter->title }}" readonly>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Ketegori Surat</div>
                        <input type="text" name="title" class="form-control" name="example-text-input"
                            placeholder="Judul" value="{{ $letter->categori->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" rows="6" readonly>{{ $letter->description }}</textarea>
                    </div>
                </div>
        </div>
    </div>
</div>
