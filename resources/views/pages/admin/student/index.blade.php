@extends('layouts.app')
@section('title')
Detail Siswa
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Siswa /</span> Profile
    </h4>
    @include('pages.components.dashboard.header')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                    <a class="btn btn-primary btn-sm" style="margin-right: 10px;" href="{{ asset('storage/'.$student_document->pas_photo) }}" download><i class="ti-xs ti ti-file me-1"></i> Foto Siswa</a>
                    <a class="btn btn-primary btn-sm" style="margin-right: 10px;" href="{{ asset('storage/'.$student_document->sd_certificate) }}"><i class="ti-xs ti ti-file me-1"></i> Ijazah SD</a>
                    <a class="btn btn-primary btn-sm" style="margin-right: 10px;" href="{{ asset('storage/'.$student_document->smp_certificate) }}"><i class="ti-xs ti ti-file me-1"></i> Ijazah SMP</a>
                    <a class="btn btn-primary btn-sm" style="margin-right: 10px;" href="{{ asset('storage/'.$student_document->birth_certificate) }}"><i class="ti-xs ti ti-file me-1"></i> Akta Kelahiran</a>
                    <a class="btn btn-primary btn-sm" style="margin-right: 10px;" href="{{ asset('storage/'.$student_document->family_card) }}"><i class="ti-xs ti ti-file me-1"></i> Kartu Keluarga</a>
                    <a class="btn btn-primary btn-sm" style="margin-right: 10px;" href="{{ asset('storage/'.$student_document->signature) }}"><i class="ti-xs ti ti-file me-1"></i> Tanda Tangan</a>
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