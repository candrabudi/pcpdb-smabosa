@extends('layouts.app')
@section('title')
Data Dokumen
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <div class="row">
        <div class="col-md-12">
            @include('pages.components.account_setting.account_pills')
            <div class="card mb-4">
                <form id="formAccountSettings" method="POST" action="{{route('create_update_document')}}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="card-header">Data Dokumen Siswa</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="first_semester" class="form-label">Upload Ijazah SD (halaman depan dan belakang), Format: Image/Pdf*</label>
                                <input class="form-control" type="file" accept="image/*,.pdf" id="sd_certificate" name="sd_certificate" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="second_semester" class="form-label">Softcopy Raport SMP (dari halaman depan), Format: Image/Pdf*</label>
                                <input class="form-control" type="file" accept="image/*,.pdf" id="smp_certificate" name="smp_certificate" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="second_semester" class="form-label">Upload Akta Kelahiran, Format: Image/Pdf*</label>
                                <input class="form-control" type="file" id="birth_certificate" name="birth_certificate" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="second_semester" class="form-label">Upload Kartu Keluarga, Format: Image/Pdf*</label>
                                <input class="form-control" type="file" accept="image/*,.pdf" id="family_card" name="family_card" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="second_semester" class="form-label">Pas Foto, Format: Image*</label>
                                <input class="form-control" type="file" accept="image/png, image/jpg, image/jpeg" id="pas_photo" name="pas_photo" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="second_semester" class="form-label">Tanda Tangan, Format: Image/Pdf*</label>
                                <input class="form-control" type="file" accept="image/*,.pdf" id="signature" name="signature" />
                            </div>
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