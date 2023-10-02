@extends('layouts.app')

@section('title', 'Info Dokumen Peserta Didik')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> Dokumen Peserta Didik</h4>

        <div class="row mt-4">
            @include('pages.components.account_setting.account_pills')
            <div class="col-lg-3 col-md-4 col-12 mb-md-0 mb-3">
                <div class="d-flex justify-content-between flex-column mb-2 mb-md-0">
                    <ul class="nav nav-align-left nav-pills flex-column">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#pasPhoto">
                                <i class="ti ti-file-horizontal me-1 ti-sm"></i>
                                <span class="align-middle fw-semibold">Pas Foto Siswa</span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ijazahSMP">
                                <i class="ti ti-file-horizontal me-1 ti-sm"></i>
                                <span class="align-middle fw-semibold">Ijazah SMP</span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ijazahSD">
                                <i class="ti ti-file-horizontal me-1 ti-sm"></i>
                                <span class="align-middle fw-semibold">Ijazah SD</span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#birthCertificate">
                                <i class="ti ti-file-horizontal me-1 ti-sm"></i>
                                <span class="align-middle fw-semibold">Akta Kelahiran</span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#softCopyRaport">
                                <i class="ti ti-file-horizontal me-1 ti-sm"></i>
                                <span class="align-middle fw-semibold">Soft Copy Raport</span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#familyCard">
                                <i class="ti ti-file-horizontal me-1 ti-sm"></i>
                                <span class="align-middle fw-semibold">Kartu Keluarga</span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#achievement">
                                <i class="ti ti-file-horizontal me-1 ti-sm"></i>
                                <span class="align-middle fw-semibold">Prestasi</span>
                            </button>
                        </li>
                    </ul>
                    <div class="d-none d-md-block">
                        <div class="mt-4">
                            <img src="../../assets/img/illustrations/girl-sitting-with-laptop.png" class="img-fluid"
                                width="270" alt="FAQ Image" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-12">
                <div class="tab-content py-0">
                    <div class="tab-pane fade show active" id="pasPhoto" role="tabpanel">
                        <div class="d-flex mb-3 gap-3">
                            <div>
                                <span class="badge bg-label-primary rounded-2 p-2">
                                    <i class="ti ti-file-horizontal ti-lg"></i>
                                </span>
                            </div>
                            <div>
                                <h4 class="mb-0">
                                    <span class="align-middle">Pas Foto Siswa</span>
                                </h4>
                                <small>Lengkapi Dokumen kamu, dengan upload pas foto</small>
                            </div>
                        </div>
                        <div id="accordionpasPhoto" class="accordion">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <form id="formValidationExamples" method="POST"
                                        action="{{ route('setting_document') }}" enctype="multipart/form-data">
                                        @csrf
                                        <h5 class="card-header"><b>Pas Foto</b> yang diunggah harus memenuhi ketentuan
                                            sebagai berikut.</h5>
                                        <div class="px-5">
                                            <ul>
                                                <li>Pasfoto terbaru ukuran <b>4 cm x 6 cm</b> dengan resolusi minimal
                                                    <b>200px x 300px (±
                                                        250 dpi)</b> dan rasio aspek 2:3.
                                                </li>
                                                <li>Pasfoto harus <b>berwarna</b> merah untuk tahun lahir ganjil lalu biru
                                                    untuk tahun lahir
                                                    genap</li>
                                                <li>File pasfoto bertipe <b>JPG/JPEG/PNG</b></li>
                                                <li>Ukuran minimal file pasfoto adalah <b>80 KB.</b></li>
                                                <li>Ukuran maksimal file pasfoto adalah <b>2048 KB.</b></li>
                                                <li>Orientasi pasfoto adalah <b>vertikal/potrait.</b></li>
                                                <li>Posisi badan dan kepala tegak sejajar menghadap kamera.</li>
                                                <li>Kualitas foto harus tajam dan fokus.</li>
                                                <li>Tidak ada bagian kepala yang terpotong dan wajah terlihat jelas.</li>
                                                <li>Kepala terletak di tengah secara horisontal (jarak kepala ke batas kiri
                                                    kurang lebih
                                                    sama dengan jarak kepala ke batas kanan).</li>
                                            </ul>
                                        </div>
                                        <p class="px-5">Unggah pasfoto Anda pada form ini dan tekan tombol <b>Unggah.</b>
                                        </p>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <input class="form-control" type="file"
                                                        accept="image/png, image/jpg, image/jpeg" id="pas_photo"
                                                        name="pas_photo" required/>
                                                    @if ($student_document && !empty($student_document->pas_photo))
                                                        <label class="mt-2"><span class="text-success">Sudah Upload</span></label>
                                                    @else
                                                        <label for="" class="text-danger mt-2">Belum
                                                            Upload</label>
                                                    @endif
                                                </div>
                                            </div>
                                            <button type="submit" id="submit-button" class="btn btn-primary me-2">Unggah
                                                Foto</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ijazahSMP" role="tabpanel">
                        <div class="d-flex mb-3 gap-3">
                            <div>
                                <span class="badge bg-label-primary rounded-2 p-2">
                                    <i class="ti ti-file-horizontal ti-lg"></i>
                                </span>
                            </div>
                            <div>
                                <h4 class="mb-0">
                                    <span class="align-middle">Ijazah SMP</span>
                                </h4>
                                <small>Upload Ijazah SD (halaman depan dan belakang), Format: Image/Pdf* (opsional) (max 2mb)</small>
                            </div>
                        </div>
                        <div id="accordionijazahSMP" class="accordion">
                            <div class="card mb-4">
                                <form id="formValidationExamples" method="POST" action="{{ route('setting_document') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="card-header"><b>Ijazah SMP</b> Scan rapor lengkap dengan identitas peserta
                                        didik.</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <input class="form-control" type="file" accept="image/png, image/jpg, image/jpeg,.pdf"
                                                    id="smp_certificate" name="smp_certificate" />
                                                @if ($student_document && !empty($student_document->smp_certificate))
                                                    <label class="mt-2"><span class="text-success">Sudah Upload</span></label>
                                                @else
                                                    <label for="" class="text-danger mt-2">Belum Upload</label>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" id="submit-button" class="btn btn-primary me-2">Unggah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ijazahSD" role="tabpanel">
                        <div class="d-flex mb-3 gap-3">
                            <div>
                                <span class="badge bg-label-primary rounded-2 p-2">
                                    <i class="ti ti-file-horizontal ti-lg"></i>
                                </span>
                            </div>
                            <div>
                                <h4 class="mb-0"><span class="align-middle">Ijazah SD</span></h4>
                                <small>Upload Ijazah SD (halaman depan dan belakang), Format: Image/Pdf* (max 2mb).</small>
                            </div>
                        </div>
                        <div id="accordionijazahSD" class="accordion">
                            <div class="card mb-4">
                                <form id="formValidationExamples" method="POST"
                                    action="{{ route('setting_document') }}" enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="card-header"><b>Ijazah SD</b> Scan  ijazah SD, lengkap dengan identitas peserta
                                        didik.</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <input class="form-control" type="file" accept="image/png, image/jpg, image/jpeg,.pdf"
                                                    id="sd_certificate" name="sd_certificate" required/>
                                                @if ($student_document && !empty($student_document->sd_certificate))
                                                    <label class="mt-2"><span class="text-success">Sudah Upload</span></label>
                                                @else
                                                    <label for="" class="text-danger mt-2">Belum Upload</label>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" id="submit-button" class="btn btn-primary me-2">Unggah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="birthCertificate" role="tabpanel">
                        <div class="d-flex mb-3 gap-3">
                            <div>
                                <span class="badge bg-label-primary rounded-2 p-2">
                                    <i class="ti ti-file-horizontal ti-lg"></i>
                                </span>
                            </div>
                            <div>
                                <h4 class="mb-0">
                                    <span class="align-middle">Upload Akata Kelahiran</span>
                                </h4>
                                <small>Upload Akta Kelahiran, Format: Image/Pdf* (max 2mb)</small>
                            </div>
                        </div>
                        <div id="accordionbirthCertificate" class="accordion">
                            <div class="card mb-4">
                                <form id="formValidationExamples" method="POST"
                                    action="{{ route('setting_document') }}" enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="card-header"><b>Akta Kelahiran</b></h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <input class="form-control" type="file" accept="image/png, image/jpg, image/jpeg,.pdf"
                                                    id="birth_certificate" name="birth_certificate" required/>
                                                @if ($student_document && !empty($student_document->birth_certificate))
                                                    <label class="mt-2"><span class="text-success">Sudah Upload</span></label>
                                                @else
                                                    <label for="" class="text-danger mt-2">Belum Upload</label>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" id="submit-button" class="btn btn-primary me-2">Unggah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="softCopyRaport" role="tabpanel">
                        <div class="d-flex mb-3 gap-3">
                            <div>
                                <span class="badge bg-label-primary rounded-2 p-2">
                                    <i class="ti ti-file-horizontal ti-lg"></i>
                                </span>
                            </div>
                            <div>
                                <h4 class="mb-0">
                                    <span class="align-middle">Upload Softcopy Raport</span>
                                </h4>
                                <small>Softcopy Raport SMP (dari halaman depan), Format: Image/Pdf* (max 2mb)</small>
                            </div>
                        </div>
                        <div id="accordionProduct" class="accordion">
                            <div class="card mb-4">
                                <form id="formValidationExamples" method="POST"
                                    action="{{ route('setting_document') }}" enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="card-header"><b>Softcopy Rapor</b></h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <input class="form-control" type="file" accept="image/png, image/jpg, image/jpeg,.pdf"
                                                    id="rapor_smp" name="rapor_smp" required/>
                                                @if ($student_document && !empty($student_document->rapor_smp))
                                                    <label class="mt-2"><span class="text-success">Sudah Upload</span></label>
                                                @else
                                                    <label for="" class="text-danger mt-2">Belum Upload</label>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" id="submit-button" class="btn btn-primary me-2">Unggah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="familyCard" role="tabpanel">
                        <div class="d-flex mb-3 gap-3">
                            <div>
                                <span class="badge bg-label-primary rounded-2 p-2">
                                    <i class="ti ti-file-horizontal ti-lg"></i>
                                </span>
                            </div>
                            <div>
                                <h4 class="mb-0">
                                    <span class="align-middle">Upload Kartu Keluarga</span>
                                </h4>
                                <small>Upload Kartu Keluarga, Format: Image/Pdf* (max 2mb)</small>
                            </div>
                        </div>
                        <div id="familyCard" class="accordion">
                            <div class="card mb-4">
                                <form id="formValidationExamples" method="POST"
                                    action="{{ route('setting_document') }}" enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="card-header"><b>Kartu Keluarga</b></h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <input class="form-control" type="file" accept="image/png, image/jpg, image/jpeg,.pdf"
                                                    id="family_card" name="family_card" required/>
                                                @if ($student_document && !empty($student_document->family_card))
                                                    <label class="mt-2"><span class="text-success">Sudah Upload</span></label>
                                                @else
                                                    <label for="" class="text-danger mt-2">Belum Upload</label>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" id="submit-button" class="btn btn-primary me-2">Unggah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="achievement" role="tabpanel">
                        <div class="d-flex mb-3 gap-3">
                            <div>
                                <span class="badge bg-label-primary rounded-2 p-2">
                                    <i class="ti ti-file-horizontal ti-lg"></i>
                                </span>
                            </div>
                            <div>
                                <h4 class="mb-0">
                                    <span class="align-middle">Upload Prestasi</span>
                                </h4>
                                <small>Upload Prestasi, Format: Image/Pdf (Opsional) (max 2mb)</small>
                            </div>
                        </div>
                        <div id="achievement" class="accordion">
                            <div class="card mb-4">
                                <form id="formValidationExamples" method="POST"
                                    action="{{ route('setting_document') }}" enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="card-header"><b>Prestasi Siswa</b></h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <input class="form-control" type="file" accept="image/*,.pdf"
                                                    id="student_achievement" name="student_achievement" />
                                                @if ($student_document && !empty($student_document->student_achievement))
                                                    <label class="mt-2"><span class="text-success">Sudah Upload</span></label>
                                                @else
                                                    <label for="" class="text-danger mt-2">Belum Upload</label>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" id="submit-button" class="btn btn-primary me-2">Unggah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /FAQ's -->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const form = document.getElementById("formValidationExamples");
        const submitButton = document.getElementById("submit-button");
        $(document).ready(function() {
            $('#submit-button').click(function() {
                Swal.fire({
                    title: 'Yakin?',
                    text: "Anda yakin akan menyimpan data ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                    customClass: {
                        confirmButton: 'btn btn-primary me-3',
                        cancelButton: 'btn btn-label-secondary'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.preventDefault();
                        form.submit();
                    } else {
                        Swal.fire({
                            icon: 'info',
                            title: 'Batal menyimpan data!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            });
        });
    </script>
@endsection
