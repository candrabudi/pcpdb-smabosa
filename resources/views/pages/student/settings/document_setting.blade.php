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
                            @foreach(['sd_certificate', 'smp_certificate', 'birth_certificate', 'family_card', 'pas_photo', 'signature'] as $document)
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
