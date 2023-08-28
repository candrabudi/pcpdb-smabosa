@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> Data Nilai Siswa</h4>

    <div class="row">
        <div class="col-md-12">
            @include('pages.components.account_setting.account_pills')

            @for ($class = 7; $class <= 9; $class++)
            <div class="card mb-4">
                <form id="formAccountSettings" method="POST" action="{{ route('setting_score') }}">
                    @csrf
                    <h5 class="card-header">Data Nilai Kelas {{ $class }}</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="first_semester" class="form-label">Semester 1</label>
                                <input class="form-control" type="hidden" id="type_class" name="type_class" value="{{ $class }}" autofocus />
                                <input class="form-control" type="number" id="first_semester" name="first_semester" value="{{ $student_scores[$class]['first_semester'] ?? '0' }}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="second_semester" class="form-label">Semester 2</label>
                                <input class="form-control" type="number" id="second_semester" name="second_semester" value="{{ $student_scores[$class]['second_semester'] ?? '0' }}" autofocus />
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
            @endfor

        </div>
    </div>
</div>
@endsection
