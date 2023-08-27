@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <div class="row">
        <div class="col-md-12">
            @include('pages.components.account_setting.account_pills')
            <div class="card mb-4">
                <h5 class="card-header">Detail Diri</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{route('update_profile')}}">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="user_nisn" class="form-label">NISN</label>
                                <input class="form-control" type="text" id="user_nisn" name="user_nisn" value="{{$student->nisn}}" autofocus />
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
                                    <input type="number" id="user_phone_house" name="user_phone_house" class="form-control" value="{{$student_detail->phone_house ?? ''}}" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="user_parent_address" class="form-label">Alamat Orang Tua</label>
                                <input type="text" class="form-control" id="user_parent_address" name="user_parent_address" value="{{$student_detail->parent_address ?? ''}}" />
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="card mb-4">
                <h5 class="card-header">Asal Sekolah</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{route('update_school_origin')}}">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="user_school_name" class="form-label">Nama Sekolah</label>
                                <input class="form-control" type="text" id="user_school_name" name="user_school_name" value="{{$student_school->school_name}}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="user_school_phone">Nomor Sekolah</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-phone"></i></span>
                                    <input type="text" id="user_school_phone" name="user_school_phone" class="form-control" value="{{$student_school->school_phone}}" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="user_school_address" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="user_school_address" name="user_school_address" value="{{$student_school->school_address}}" />
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection