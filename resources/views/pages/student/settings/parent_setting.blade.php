@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> Orangtua Siswa</h4>

    <div class="row">
        <div class="col-md-12">
            @include('pages.components.account_setting.account_pills')
            <form action="{{route('setting_student_mother')}}" method="post">
                @include('components.partials.parent_form', ['parent' => $student_father, 'parentType' => 'father','route' => 'setting_student_father', 'title' => 'Data Ayah Siswa'])
                @include('components.partials.parent_form', ['parent' => $student_mother, 'parentType' => 'mother','route' => 'setting_student_mother', 'title' => 'Data Ibu Siswa'])
                <div class="card mb-4">
                    <div class="card-body">
                        @csrf
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