<div class="modal fade" id="staticBackdrop{{ $b->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <h4 class="fw-bold text-primary mb-3 text-center">{{ $b->judul }}</h4>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center p-2 rounded-3 shadow-sm border-0">
                            <div class="bg-primary bg-opacity-10 rounded-3 text-primary p-2 me-2">
                                <i class="fas fa-user-pen text-primary fs-4"></i>
                            </div>
                            <div>
                                <div class="text-muted small">Penulis </div>
                                <div class="fw-medium">{{ $b->penulis }}</div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center p-2 shadow-sm rounded-3 border-0">
                            <div class="bg-success bg-opacity-10 p-2 text-success rounded-3 me-2">
                                <i class="fas fa-building text-success fs-4"></i>
                            </div>
                            <div>
                                <div class="text-muted small">Penerbit </div>
                                <div class="fw-medium">{{ $b->penerbit }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center p-2 shadow-sm rounded-3 border-0">
                            <div class="bg-info bg-opacity-10 p-2 text-info rounded-3 me-2">
                                <i class="fas fa-book-open fs-4"></i>
                            </div>
                            <div>
                                <div class="text-muted small">kategori </div>
                                <div class="fw-medium">{{ $b->kategori }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center p-2 rounded-3 shadow-sm border-0">
                            <div class="bg-warning bg-opacity-10 rounded-3 text-warning p-2 me-2">
                                <i class="fas fa-calendar-alt fs-4"></i>
                            </div>
                            <div>
                                <div class="text-muted small">Tahun Terbit </div>
                                <div class="fw-medium">{{ $b->tahun_terbit }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center p-2 rounded-3 shadow-sm border-0">
                            <div class="bg-secondary bg-opacity-10 rounded-3 text-secondary p-2 me-2">
                                <i class="fas fa-boxes-stacked fs-4"></i>
                            </div>
                            <div>
                                <div class="text-muted small">Stok total </div>
                                <div class="fw-medium">{{ $b->stok }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center p-2 shadow-sm rounded-3 border-0">
                            <div class="bg-primary bg-opacity-10 p-2 text-primary rounded-3 me-2">
                                <i class="fas fa-check-circle fs-4"></i>
                            </div>
                            <div>
                                <div class="text-muted small">Tersedia </div>
                                <div class="fw-medium">{{ $b->tersedia }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center p-2 shadow-sm border-0 rounded-4">
                            <div class="bg-danger bg-opacity-10 rounded-3 p-2 me-2">
                                <i class="fas fa-book-reader text-danger fs-4"></i>
                            </div>
                            <div>
                                <div class="text-muted small">Dipinjam</div>
                                <div class="fw-semibold text-danger">{{ $b->dipinjam }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
