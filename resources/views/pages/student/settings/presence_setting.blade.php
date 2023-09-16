@extends('layouts.app')
@section('title', 'Informasi Absensi Peserta Didik')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> Absensi Peserta Didik</h4>

    <div class="row">
        <div class="col-md-12">
            @include('pages.components.account_setting.account_pills')

            <form id="formValidationExamples" method="POST" action="{{ route("setting_presence") }}">
                @csrf
                @foreach (['seven', 'eight', 'nine'] as $classType)
                <div class="card mb-4">
                    <h5 class="card-header">Data Absensi Kelas {{ ($classType == "seven" ? 7 : ($classType == "eight" ? 8 : 9)) }}</h5>
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
            </form>
            <div class="card">
                <div class="card-body">
                    <div class="mt-2">
                        <button type="submit" id="submit-button" class="btn btn-primary me-2">Simpan Perubahan</button>
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