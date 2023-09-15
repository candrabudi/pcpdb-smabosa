@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Profile Peserta Didik</h4>
    
    @foreach([
        'student' => 'Mohon lengkapi data diri anda untuk mempercepat proses PCPDB',
        'student_school' => 'Mohon lengkapi data diri anda untuk mempercepat proses PCPDB',
        'student_scores' => 'Maaf data nilai kamu belum dilengkapi, silahkan lengkapi data nilai',
        'student_presences' => 'Maaf data absen kamu belum dilengkapi, silahkan lengkapi data absen',
        'student_document' => 'Maaf data dokumen kamu belum dilengkapi, silahkan lengkapi data dokumen',
        'student_mother' => 'Maaf data orang tua belum dilengkapi, silahkan lengkapi data orang tua',
        'student_father' => 'Maaf data orang tua belum dilengkapi, silahkan lengkapi data orang tua',
        'student_detail' => 'Maaf data alamat orang tua dan telepon rumah belum di lengkapi'
    ] as $validationKey => $validationMessage)
        @if(!$data_validation[$validationKey])
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <span class="alert-icon text-danger me-2">
                    <i class="ti ti-user ti-xs"></i>
                </span>
                {{ $validationMessage }}
            </div>
        @endif
    @endforeach
    
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
