@extends('layouts.app')
@section('title', 'Data Dokumen')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> Dokumen Siswa</h4>

    <div class="row">
        <div class="col-md-12">
            @include('pages.components.account_setting.account_pills')
            <div class="card mb-4">
                <form id="formAccountSettings" method="POST" action="{{ route('setting_document') }}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="card-header">Data Dokumen Siswa</h5>
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
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                        </div>
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
        'sd_certificate' => 'Upload Ijazah SD (halaman depan dan belakang), Format: Image/Pdf*',
        'smp_certificate' => 'Softcopy Raport SMP (dari halaman depan), Format: Image/Pdf*',
        'birth_certificate' => 'Upload Akta Kelahiran, Format: Image/Pdf*',
        'family_card' => 'Upload Kartu Keluarga, Format: Image/Pdf*',
        'pas_photo' => 'Pas Foto, Format: Image*',
        'signature' => 'Tanda Tangan, Format: Image/Pdf*',
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
