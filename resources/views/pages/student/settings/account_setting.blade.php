@extends('layouts.app')
@section('title', 'Detail Data Diri')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> Data Diri Siswa</h4>

    <div class="row">
        <div class="col-md-12">
            @include('pages.components.account_setting.account_pills')
            <form id="formValidationExamples" method="POST" action="{{route('setting_personal_data')}}">
                <div class="card mb-4">
                    <h5 class="card-header">Detail Data Diri</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="user_nisn" class="form-label">NISN</label>
                                <input class="form-control" type="text" id="user_nisn" name="user_nisn" value="{{$student->nisn ?? old('user_nisn')}}" autofocus required />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="user_full_name" class="form-label">Nama Lengkap</label>
                                <input class="form-control" type="text" id="user_full_name" name="user_full_name" value="{{$user->full_name}}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="user_email" class="form-label">Email</label>
                                <input class="form-control" type="text" name="user_email" id="user_email" value="{{$user->email}}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="user_gender" class="form-label">Gender</label>
                                <select id="user_gender" name="user_gender" class="select2 form-select">
                                    <option value="">Select</option>
                                    <option value="Laki-laki" {{($student->gender == 'Laki-laki') ? 'selected' : ''}}>Laki-laki</option>
                                    <option value="Perempuan" {{($student->gender == 'Perempuan') ? 'selected' : ''}}>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="user_phone_number">Nomor Handphone</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-phone"></i></span>
                                    <input type="number" id="user_phone_number" name="user_phone_number" class="form-control" value="{{$student->phone_number}}" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="user_whatsapp_phone">Nomor Whatsapp</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-brand-whatsapp"></i></span>
                                    <input type="number" id="user_whatsapp_phone" name="user_whatsapp_phone" class="form-control" value="{{$student->whatsapp_phone}}" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="user_address" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="user_address" name="user_address" value="{{$student->address}}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="user_phone_house">Nomor Telp Rumah</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-phone"></i></span>
                                    <input type="number" id="user_phone_house" name="user_phone_house" class="form-control" value="{{$student_detail->phone_house ?? old('user_phone_house')}}" required />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="user_parent_address" class="form-label">Alamat Orang Tua</label>
                                <input type="text" class="form-control" id="user_parent_address" name="user_parent_address" value="{{$student_detail->parent_address ?? old('user_parent_address')}}" required />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Asal Sekolah</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="user_school_name" class="form-label">Nama Sekolah</label>
                                <input class="form-control" type="text" id="user_school_name" name="user_school_name" value="{{$student_school->school_name}}" autofocus required />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="user_school_phone">Nomor Sekolah</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-phone"></i></span>
                                    <input type="text" id="user_school_phone" name="user_school_phone" class="form-control" value="{{$student_school->school_phone}}" required />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="user_school_address" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="user_school_address" name="user_school_address" value="{{$student_school->school_address}}" required />
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            <div class="card mb-4">
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
