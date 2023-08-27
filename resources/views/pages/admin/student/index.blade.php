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