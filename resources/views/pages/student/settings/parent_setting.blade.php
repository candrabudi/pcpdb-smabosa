@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> Orangtua Siswa</h4>

    <div class="row">
        <div class="col-md-12">
            @include('pages.components.account_setting.account_pills')

            @include('components.partials.parent_form', ['parent' => $student_father, 'parentType' => 'father','route' => 'setting_student_father', 'title' => 'Data Ayah Siswa'])
            @include('components.partials.parent_form', ['parent' => $student_mother, 'parentType' => 'mother','route' => 'setting_student_mother', 'title' => 'Data Ibu Siswa'])
        </div>
    </div>
</div>
@endsection
