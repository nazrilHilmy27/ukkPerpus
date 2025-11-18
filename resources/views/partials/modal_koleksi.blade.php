<div class="modal fade" id="staticBackdrop{{ $k->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Koleksi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                <!-- Header dengan judul dan kode -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-between mb-2">
                            <h3 class="fw-bold text-primary mb-0">{{ $k->judul }}</h3>
                            <span class="badge bg-light text-dark border rounded-pill d-flex align-items-center px-3">
                                <i class="fas fa-qrcode me-1"></i> {{ $k->kode_koleksi }}
                            </span>
                        </div>
                        <div class="border-bottom pb-3"></div>
                    </div>
                </div>

                <!-- Informasi Utama dalam Card -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card  border-0 shadow-sm">
                            <div class="card-header bg-light py-3">
                                <h5 class="mb-0"><i class="fas fa-info-circle text-primary me-2"></i>Informasi Koleksi</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 rounded p-2 me-3">
                                        <i class="fas fa-user-pen text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted small">Penulis</div>
                                        <div class="fw-medium">{{ $k->penulis }}</div>
                                    </div>
                                </div>
                                
                                <div class="mb-3 d-flex align-items-center">
                                    <div class="bg-success bg-opacity-10 rounded p-2 me-3">
                                        <i class="fas fa-calendar text-success"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted small">Tahun</div>
                                        <div class="fw-medium">{{ $k->tahun }}</div>
                                    </div>
                                </div>
                                
                                <div class="mb-3 d-flex align-items-center">
                                    <div class="bg-info bg-opacity-10 rounded p-2 me-3">
                                        <i class="fas fa-layer-group text-info"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted small">Jenis</div>
                                        <div class="fw-medium">{{ $k->jenis }}</div>
                                    </div>
                                </div>
                                
                                <div class="mb-3 d-flex align-items-center">
                                    <div class="bg-warning bg-opacity-10 rounded p-2 me-3">
                                        <i class="fas fa-warehouse text-warning"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted small">Lokasi</div>
                                        <div class="fw-medium">{{ $k->lokasi }}</div>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-center">
                                    <div class="bg-danger bg-opacity-10 rounded p-2 me-3">
                                        <i class="fas fa-circle-info text-danger"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted small">Kondisi</div>
                                        <div>
                                            <span class="badge bg-{{ $k->kondisi == 'Baik' ? 'success' : ($k->kondisi == 'Rusak' ? 'danger' : 'warning') }} py-2 px-3 rounded-pill">
                                                {{ $k->kondisi }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi dalam Card -->
                    <div class="col-md-6 mt-3 mt-md-0">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-header bg-light py-3">
                                <h5 class="mb-0"><i class="fas fa-align-left text-primary me-2"></i>Deskripsi</h5>
                            </div>
                            <div class="card-body">
                                <div class="deskripsi-container p-3 rounded bg-light" style="max-height: 200px; overflow-y: auto;">
                                    <p class="mb-0" style="line-height: 1.6; text-align: justify;">
                                        {{ $k->deskripsi }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- File Digital Section -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-light py-3 d-flex justify-content-between align-items-center">
                                <h5 class="mb-0"><i class="fas fa-file-alt text-primary me-2"></i>File Digital</h5>
                                @if ($k->file_digital)
                                    @php
                                        $ext = strtolower(pathinfo($k->file_digital, PATHINFO_EXTENSION));
                                        $fileSize = file_exists(public_path('uploads/koleksi/' . $k->file_digital)) 
                                            ? round(filesize(public_path('uploads/koleksi/' . $k->file_digital)) / 1024 / 1024, 2) 
                                            : '?';
                                    @endphp
                                    <span class="badge bg-primary">{{ strtoupper($ext) }} • {{ $fileSize }} MB</span>
                                @endif
                            </div>
                            <div class="card-body text-center p-4">
                                @if ($k->file_digital)
                                    @php
                                        $ext = strtolower(pathinfo($k->file_digital, PATHINFO_EXTENSION));
                                        $fileUrl = asset('uploads/koleksi/' .$k->file_digital);
                                    @endphp

                                    <!-- Gambar -->
                                    @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                                        <div class="file-preview-container mb-3">
                                            <img src="{{ $fileUrl }}" 
                                                alt="Gambar Koleksi" 
                                                class="img-fluid rounded-3 shadow border"
                                                style="max-height: 400px; object-fit: contain;"
                                                onclick="openFullscreen(this)">
                                            <div class="mt-2">
                                                <button class="btn btn-sm btn-outline-primary me-2" onclick="openFullscreen(this.previousElementSibling)">
                                                    <i class="fas fa-expand me-1"></i> Perbesar
                                                </button>
                                                <a href="{{ $fileUrl }}" download class="btn btn-sm btn-outline-success">
                                                    <i class="fas fa-download me-1"></i> Unduh
                                                </a>
                                            </div>
                                        </div>

                                    <!-- PDF -->
                                    @elseif ($ext === 'pdf')
                                        <div class="file-preview-container">
                                            <div class="pdf-preview rounded-3 overflow-hidden shadow border mb-3" style="height: 500px; position: relative;">
                                                <embed src="{{ $fileUrl }}#toolbar=0&navpanes=0" 
                                                    type="application/pdf" width="100%" height="100%">
                                                <div class="pdf-overlay d-flex justify-content-center align-items-center position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-10">
                                                    <a href="{{ $fileUrl }}" target="_blank" class="btn btn-primary">
                                                        <i class="fas fa-external-link-alt me-1"></i> Buka di Tab Baru
                                                    </a>
                                                </div>
                                            </div>
                                            <a href="{{ $fileUrl }}" download class="btn btn-outline-success">
                                                <i class="fas fa-download me-1"></i> Unduh PDF
                                            </a>
                                        </div>

                                    <!-- Audio -->
                                    @elseif (in_array($ext, ['mp3', 'wav']))
                                        <div class="file-preview-container">
                                            <div class="audio-player p-4 rounded bg-light shadow-sm mb-3">
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="fas fa-music text-primary fa-2x me-3"></i>
                                                    <div class="text-start">
                                                        <div class="fw-bold">File Audio</div>
                                                        <div class="text-muted small">Format: {{ strtoupper($ext) }}</div>
                                                    </div>
                                                </div>
                                                <audio controls class="w-100">
                                                    <source src="{{ $fileUrl }}" type="audio/{{ $ext }}">
                                                    Browser Anda tidak mendukung pemutar audio.
                                                </audio>
                                            </div>
                                            <a href="{{ $fileUrl }}" download class="btn btn-outline-success">
                                                <i class="fas fa-download me-1"></i> Unduh Audio
                                            </a>
                                        </div>

                                    <!-- Video -->
                                    @elseif (in_array($ext, ['mp4', 'webm']))
                                        <div class="file-preview-container">
                                            <div class="video-player rounded-3 overflow-hidden shadow border mb-3" style="max-height: 400px;">
                                                <video controls class="w-100" style="border-radius: 12px;">
                                                    <source src="{{ $fileUrl }}" type="video/{{ $ext }}">
                                                    Browser Anda tidak mendukung pemutar video.
                                                </video>
                                            </div>
                                            <a href="{{ $fileUrl }}" download class="btn btn-outline-success">
                                                <i class="fas fa-download me-1"></i> Unduh Video
                                            </a>
                                        </div>

                                    <!-- File Lainnya -->
                                    @else
                                        <div class="file-preview-container">
                                            <div class="p-5 rounded bg-light shadow-sm mb-3">
                                                <i class="fas fa-file text-primary fa-4x mb-3"></i>
                                                <h5 class="mb-2">File Digital</h5>
                                                <p class="text-muted mb-3">Format file: {{ strtoupper($ext) }}</p>
                                            </div>
                                            <a href="{{ $fileUrl }}" target="_blank" class="btn btn-primary me-2">
                                                <i class="fas fa-external-link-alt me-1"></i> Lihat File
                                            </a>
                                            <a href="{{ $fileUrl }}" download class="btn btn-outline-success">
                                                <i class="fas fa-download me-1"></i> Unduh File
                                            </a>
                                        </div>
                                    @endif
                                @else
                                    <div class="p-5 text-center">
                                        <i class="fas fa-file-circle-xmark text-muted fa-4x mb-3"></i>
                                        <h5 class="text-muted">Tidak Ada File Digital</h5>
                                        <p class="text-muted">Tidak ada file digital tersedia untuk koleksi ini.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fullscreen Modal untuk Gambar -->
            <div class="modal fade" id="imageFullscreenModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content bg-dark">
                        <div class="modal-header border-0">
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex justify-content-center align-items-center">
                            <img src="" id="fullscreenImage" class="img-fluid" style="max-height: 90vh; object-fit: contain;">
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