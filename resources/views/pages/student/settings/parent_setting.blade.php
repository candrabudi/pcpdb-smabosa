@extends('layouts.app')
@section('title', 'Informasi Orangtua Peserta Didik')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> Orangtua Peserta Didik</h4>

    <div class="row">
        <div class="col-md-12">
            @include('pages.components.account_setting.account_pills')
            <form action="{{route('setting_student_mother')}}" id="formValidationExamples" method="post">
                @csrf
                @include('components.partials.parent_form', ['parent' => $student_father, 'parentType' => 'father','route' => 'setting_student_father', 'title' => 'Data Ayah Peserta Didik'])
                @include('components.partials.parent_form', ['parent' => $student_mother, 'parentType' => 'mother','route' => 'setting_student_mother', 'title' => 'Data Ibu Peserta Didik'])
            </form>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mt-2">
                        <button id="submit-button" class="btn btn-primary me-2">Simpan Perubahan</button>
                        <button type="reset" class="btn btn-label-secondary">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    const form = document.getElementById("formValidationExamples");
    const submitButton = document.getElementById("submit-button");
    $(document).ready(function() {
        $('#submit-button').click(function() {
            Swal.fire({
                title: 'Yakin?',
                text: "Anda yakin akan menyimpan data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                customClass: {
                    confirmButton: 'btn btn-primary me-3',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    event.preventDefault();
                    form.submit();
                } else {
                    Swal.fire({
                        icon: 'info',
                        title: 'Batal menyimpan data!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
    });
</script>
@endsection