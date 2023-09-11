@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> Nilai Siswa</h4>

    <div class="row">
        <div class="col-md-12">
            @include('pages.components.account_setting.account_pills')

            <form id="formAccountSettings" method="POST" action="{{ route("setting_presence") }}">
                @csrf
                @foreach (['seven', 'eight', 'nine'] as $classType)
                <div class="card mb-4">
                    <h5 class="card-header">Data Absensi Kelas {{ ucfirst($classType) }}</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                @component('components.form-fields', ['student' => ${"student_$classType"}, 'classType' => $classType, 'semester' => 'one'])@endcomponent
                            </div>
                            <div class="col-lg-6">
                                @component('components.form-fields', ['student' => ${"student_$classType"}, 'classType' => $classType, 'semester' => 'two'])@endcomponent
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="card">
                    <div class="card-body">
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection