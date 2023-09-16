@extends('layouts.app')
@section('title', 'Data Dokumen')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> Dokumen Peserta Didik</h4>

    <div class="row">
        <div class="col-md-12">
            @include('pages.components.account_setting.account_pills')
            <div class="card mb-4">
                <form id="formValidationExamples" method="POST" action="{{ route('setting_document') }}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="card-header">Data Dokumen Peserta Didik</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            @foreach(['sd_certificate', 'smp_certificate', 'birth_certificate', 'family_card', 'signature', 'student_achievement'] as $document)
                            <div class="mb-3 col-md-6">
                                <label for="{{ $document }}" class="form-label">{{ documentLabel($document) }}</label>
                                <input class="form-control" type="file" accept="{{ documentAccept($document) }}" id="{{ $document }}" name="{{ $document }}" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                </form>
                <div class="card">
                    <div class="card-body">
                        <div class="mt-2">
                            <button type="submit" id="submit-button" class="btn btn-primary me-2">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card mb-4">
                <form id="formValidationExamples" method="POST" action="{{ route('setting_document') }}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="card-header"><b>Pas Foto</b> yang diunggah harus memenuhi ketentuan sebagai berikut.</h5>
                    <div class="px-5">
                        <ul>
                            <li>Pasfoto terbaru ukuran <b>4 cm x 6 cm</b> dengan resolusi minimal <b>200px x 300px (± 250 dpi)</b> dan rasio aspek 2:3.</li>
                            <li>Pasfoto harus <b>berwarna</b> dengan latar belakang polos berwarna apa saja.</li>
                            <li>File pasfoto bertipe <b>JPG/JPEG/PNG</b></li>
                            <li>Ukuran minimal file pasfoto adalah <b>80 KB.</b></li>
                            <li>Ukuran maksimal file pasfoto adalah <b>2048 KB.</b></li>
                            <li>Orientasi pasfoto adalah <b>vertikal/potrait.</b></li>
                            <li>Posisi badan dan kepala tegak sejajar menghadap kamera.</li>
                            <li>Kualitas foto harus tajam dan fokus.</li>
                            <li>Tidak ada bagian kepala yang terpotong dan wajah terlihat jelas.</li>
                            <li>Kepala terletak di tengah secara horisontal (jarak kepala ke batas kiri kurang lebih sama dengan jarak kepala ke batas kanan).</li>
                        </ul>
                    </div>
                    <p class="px-5">Unggah pasfoto Anda pada form ini dan tekan tombol <b>Unggah.</b></p>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <input class="form-control" type="file" accept="pas_photo" id="pas_photo" name="pas_photo" />
                            </div>
                        </div>
                        <button type="submit" id="submit-button" class="btn btn-primary me-2">Unggah Foto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@php
function documentLabel($document)
{
    $labels = [
        'sd_certificate' => 'Upload Ijazah SD (halaman depan dan belakang), Format: Image/Pdf* (max 2mb)',
        'smp_certificate' => 'Softcopy Raport SMP (dari halaman depan), Format: Image/Pdf* (max 2mb)',
        'birth_certificate' => 'Upload Akta Kelahiran, Format: Image/Pdf* (max 2mb)',
        'student_achievement' => 'Upload Prestasi, Format: Image/Pdf (Opsional) (max 2mb)',
        'family_card' => 'Upload Kartu Keluarga, Format: Image/Pdf* (max 2mb)',
        'pas_photo' => 'Pas Foto, Format: Image* (max 2mb)',
        'signature' => 'Tanda Tangan, Format: Image/Pdf* (max 2mb)',
    ];
    return $labels[$document] ?? '';
}

function documentAccept($document)
{
    if ($document == 'pas_photo') {
        return 'image/png, image/jpg, image/jpeg';
    }
    return 'image/*,.pdf';
}
@endphp

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
