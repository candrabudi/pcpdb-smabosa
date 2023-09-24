@extends('layouts.app')
@section('title')
Detail Peserta Didik
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Peserta Didik /</span> Profile
    </h4>
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <p class="mb-2">{{ session('error') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @include('pages.components.dashboard.header')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                <a class="btn btn-primary btn-sm" style="margin-right: 10px;" href="{{ $student_document && $student_document->pas_photo ? asset('storage/' . $student_document->pas_photo) : '' }}" download><i class="ti-xs ti ti-file me-1"></i> Foto Peserta Didik</a>
                <a class="btn btn-primary btn-sm" style="margin-right: 10px;" href="{{ $student_document && $student_document->sd_certificate ? asset('storage/' . $student_document->sd_certificate) : '' }}" download><i class="ti-xs ti ti-file me-1"></i> Ijazah SD</a>
                <a class="btn btn-primary btn-sm" style="margin-right: 10px;" href="{{ $student_document && $student_document->rapor_smp ? asset('storage/' . $student_document->rapor_smp) : '' }}" download><i class="ti-xs ti ti-file me-1"></i> Ijazah SMP</a>
                <a class="btn btn-primary btn-sm" style="margin-right: 10px;" href="{{ $student_document && $student_document->birth_certificate ? asset('storage/' . $student_document->birth_certificate) : '' }}" download><i class="ti-xs ti ti-file me-1"></i> Akta Kelahiran</a>
                <a class="btn btn-primary btn-sm" style="margin-right: 10px;" href="{{ $student_document && $student_document->family_card ? asset('storage/' . $student_document->family_card) : '' }}" download><i class="ti-xs ti ti-file me-1"></i> Kartu Keluarga</a>
                <a class="btn btn-primary btn-sm" style="margin-right: 10px;" href="{{ $student_document && $student_document->signature ? asset('storage/' . $student_document->signature) : '' }}" download><i class="ti-xs ti ti-file me-1"></i> Tanda Tangan</a>
                <a class="btn btn-primary btn-sm" style="margin-right: 10px;" href="{{ $student_document && $student_document->student_achievement ? asset('storage/' . $student_document->student_achievement) : '' }}" download><i class="ti-xs ti ti-file me-1"></i> Prestasi Siswa</a>
                <a class="btn btn-primary btn-sm" style="margin-right: 10px;" href="{{ route('admin.formulir', $student->user_id) }}"><i class="ti-xs ti ti-file me-1"></i> Download Formulir</a>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            @include('pages.components.dashboard.utils.about_users')
            @if($student_scores)
            @include('pages.components.dashboard.utils.profile_overview')
            @endif
        </div>
        <div class="col-xl-4 col-lg-5 col-md-5">
            @include('pages.components.dashboard.utils.about_parent')
        </div>
        <div class="col-xl-4 col-lg-5 col-md-5">
            @include('pages.components.dashboard.utils.student_presence')
        </div>
    </div>
</div>
@endsection