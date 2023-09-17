@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        @if(session('error'))
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <span class="alert-icon text-danger me-2">
                <i class="ti ti-x ti-xs"></i>
            </span>
            {{session('error')}}
        </div>
        @endif
        @if(Auth::user()->student->status == "diterima")
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <span class="alert-icon text-success me-2">
                <i class="ti ti-check ti-xs"></i>
            </span>
            Selamat Kamu Diterima di SMA BOPKRI 1 YOGYAKARTA
        </div>
        @endif

        @if(Auth::user()->student->status == "ditolak")
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <span class="alert-icon text-danger me-2">
                <i class="ti ti-ban ti-xs"></i>
            </span>
            Maaf, Sayangnya Kamu Tidak Diterima di SMA BOPKRI 1 YOGYAKARTA
        </div>
        @endif

        @if(Auth::user()->student->status == "daftar")
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <span class="alert-icon text-danger me-2">
                <i class="ti ti-bell ti-xs"></i>
            </span>
            Kamu Berhasil Mendaftar, Yuk Ikuti Update Mengenai Penerimaan Peserta Didik Baru
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-xl-6 mb-6 col-lg-6 col-12">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-7">
                        <div class="card-body text-nowrap">
                            <h5 class="card-title mb-0">Selamat Datang {{Auth::user()->full_name}} 🎉</h5>
                            <p class="mb-2">Ayo selesaikan pendaftaran kamu, <br> dan nantikan pengumuman penerimaan dari pihak sekolah!</p>
                            <div class="mt-3">
                                <a href="{{route('page_personal_data')}}" class="btn btn-warning btn-sm">
                                    Isi Formulir
                                </a>
                                <a href="{{route('student_formulir')}}" class="btn btn-info btn-sm">
                                    Download Formulir
                                </a>
                                @if(Auth::user()->student->status == "diterima" || Auth::user()->student->status == "ditolak")
                                <a href="{{asset('storage/'.Auth::user()->student->file_path)}}" class="btn btn-primary btn-sm">
                                    Download Lembar Kesepakatan
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::user()->student->status == "diterima")
    <h4 class="pb-1 mb-4 text-muted mt-3">Pengumuman</h4>
    <div class="row mb-5">
        @foreach($data_broadcast as $db)
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$db['title']}}</h5>
                    <p class="card-text">
                        {{$db['notes']}}
                    </p>
                    @if($db['is_file'] == true)
                    <a href="{{$db['file']}}" class="btn btn-primary" download>Download File</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection