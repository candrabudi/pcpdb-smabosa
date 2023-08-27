@extends('layouts.app')
@section('title')
Dashboard
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Siswa /</span> Profile
    </h4>
    @if(!$data_validation['student'])
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <span class="alert-icon text-danger me-2">
                <i class="ti ti-user ti-xs"></i>
            </span>
            Mohon lengkapi data diri anda untuk mempercepat proses PCPDB
        </div>
    @endif
    @if(!$data_validation['student_school'])
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <span class="alert-icon text-danger me-2">
                <i class="ti ti-user ti-xs"></i>
            </span>
            Mohon lengkapi data diri anda untuk mempercepat proses PCPDB
        </div>
    @endif
    @if(!$data_validation['student_scores'])
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <span class="alert-icon text-danger me-2">
                <i class="ti ti-user ti-xs"></i>
            </span>
            Maaf data nilai kamu belum dilengkapi, silahkan lengkapi data nilai
        </div>
    @endif
    @if(!$data_validation['student_presences'])
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <span class="alert-icon text-danger me-2">
                <i class="ti ti-user ti-xs"></i>
            </span>
            Maaf data absen kamu belum dilengkapi, silahkan lengkapi data absen
        </div>
    @endif
    @if(!$data_validation['student_document'])
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <span class="alert-icon text-danger me-2">
                <i class="ti ti-user ti-xs"></i>
            </span>
            Maaf data dokumen kamu belum dilengkapi, silahkan lengkapi data dokumen
        </div>
    @endif
    @if(!$data_validation['student_mother'] || !$data_validation['student_mother'] || !$data_validation['student_father'])
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <span class="alert-icon text-danger me-2">
                <i class="ti ti-user ti-xs"></i>
            </span>
            Maaf data orang tua belum dilengkapi, silahkan lengkapi data orang tua
        </div>
    @endif
    @if(!$data_validation['student_detail'])
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <span class="alert-icon text-danger me-2">
                <i class="ti ti-user ti-xs"></i>
            </span>
            Maaf data alamat orang tua dan telepon rumah belum di lengkapi
        </div>
    @endif
    @include('pages.components.dashboard.header')
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