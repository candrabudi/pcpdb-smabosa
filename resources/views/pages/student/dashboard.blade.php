@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-4 mb-4 col-lg-5 col-12">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection