@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Siswa /</span> Profile
    </h4>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <span class="alert-icon text-danger me-2">
            <i class="ti ti-user ti-xs"></i>
        </span>
        Mohon lengkapi data diri anda untuk mempercepat proses PCPDB
    </div>
    @include('pages.components.dashboard.header')
    <!-- @include('pages.components.dashboard.navbar_pills') -->
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            @include('pages.components.dashboard.utils.about_users')
            @include('pages.components.dashboard.utils.profile_overview')
        </div>
        <div class="col-xl-8 col-lg-7 col-md-7">
            <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0">Activity Timeline</h5>
                    <div class="card-action-element">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection