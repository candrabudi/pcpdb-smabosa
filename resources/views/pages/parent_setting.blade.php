@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <div class="row">
        <div class="col-md-12">
            @include('pages.components.account_setting.account_pills')
            <div class="card mb-4">
                <h5 class="card-header">Data Ayah Siswa</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{route('create_update_fathre')}}">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="f_parent_name" class="form-label">Nama Ayah</label>
                                <input class="form-control" type="text" id="f_parent_name" name="f_parent_name" value="{{$student_father->parent_name ?? ''}}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="f_birth_place" class="form-label">Tempat Lahir</label>
                                <input class="form-control" type="text" id="f_birth_place" name="f_birth_place" value="{{$student_father->birth_place ?? ''}}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="f_birth_date" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="f_birth_date" value="{{$student_father->birth_date ?? '' }}" placeholder="YYYY-MM-DD" id="flatpickr-date" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="f_education" class="form-label">Pendidikan</label>
                                <select id="f_education" name="f_education" class="form-select select2" data-allow-clear="true">
                                    <option value="">Pilih</option>
                                    <option value="SD"  {{optional($student_father)->education === 'SD' ? 'selected' : ''}}>SD</option>
                                    <option value="SMP" {{optional($student_father)->education === 'SMP' ? 'selected' : ''}}>SMP</option>
                                    <option value="SMA" {{optional($student_father)->education === 'SMA' ? 'selected' : ''}}>SMA</option>
                                    <option value="SMK" {{optional($student_father)->education === 'SMK' ? 'selected' : ''}}>SMK</option>
                                    <option value="S1" {{optional($student_father)->education === 'S1' ? 'selected' : ''}}>S1</option>
                                    <option value="S2" {{optional($student_father)->education === 'S2' ? 'selected' : ''}}>S2</option>
                                    <option value="S3" {{optional($student_father)->education === 'S3' ? 'selected' : ''}}>S3</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="f_religion" class="form-label">Agama</label>
                                <select id="f_religion" name="f_religion" class="form-select select2" data-allow-clear="true">
                                    <option value="">Pilih</option>
                                    <option value="Islam"  {{optional($student_father)->religion == 'Islam' ? 'selected' : ''}}>Islam</option>
                                    <option value="Kristen" {{optional($student_father)->religion == 'Kristen' ? 'selected' : ''}}>Kristen</option>
                                    <option value="Katholik" {{optional($student_father)->religion == 'Katholik' ? 'selected' : ''}}>Katholik</option>
                                    <option value="Protestan" {{optional($student_father)->religion == 'Protestan' ? 'selected' : ''}}>Protestan</option>
                                    <option value="Budha" {{optional($student_father)->religion == 'Budha' ? 'selected' : ''}}>Budha</option>
                                    <option value="Hindu" {{optional($student_father)->religion == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="f_profession" class="form-label">Pekerjaan</label>
                                <input class="form-control" type="text" id="f_profession" name="f_profession" value="{{$student_father->profession ?? ''}}" autofocus />
                            </div> 
                            <div class="mb-3 col-md-6">
                                <label for="f_income" class="form-label">Pendapatan</label>
                                <input class="form-control" type="text" id="f_income" name="f_income" value="{{$student_father->income ?? ''}}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="f_whatsapp_phone">Nomor Whatsapp</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-phone"></i></span>
                                    <input type="text" id="f_whatsapp_phone" name="f_whatsapp_phone" class="form-control" value="{{$student_father->whatsapp_phone ?? ''}}" />
                                </div>
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
                <h5 class="card-header">Data Ibu Siswa</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{route('create_update_mother')}}">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="m_parent_name" class="form-label">Nama Ibu</label>
                                <input class="form-control" type="text" id="m_parent_name" name="m_parent_name" value="{{$student_mother->parent_name ?? ''}}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="m_birth_place" class="form-label">Tempat Lahir</label>
                                <input class="form-control" type="text" id="m_birth_place" name="m_birth_place" value="{{$student_mother->birth_place ?? ''}}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="m_birth_date" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="m_birth_date" value="{{$student_mother->birth_date ?? '' }}" placeholder="YYYY-MM-DD" id="flatpickr-date2" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="m_education" class="form-label">Pendidikan</label>
                                <select id="m_education" name="m_education" class="form-select select2" data-allow-clear="true">
                                    <option value="">Pilih</option>
                                    <option value="SD"  {{optional($student_mother)->education === 'SD' ? 'selected' : ''}}>SD</option>
                                    <option value="SMP" {{optional($student_mother)->education === 'SMP' ? 'selected' : ''}}>SMP</option>
                                    <option value="SMA" {{optional($student_mother)->education === 'SMA' ? 'selected' : ''}}>SMA</option>
                                    <option value="SMK" {{optional($student_mother)->education === 'SMK' ? 'selected' : ''}}>SMK</option>
                                    <option value="S1" {{optional($student_mother)->education === 'S1' ? 'selected' : ''}}>S1</option>
                                    <option value="S2" {{optional($student_mother)->education === 'S2' ? 'selected' : ''}}>S2</option>
                                    <option value="S3" {{optional($student_mother)->education === 'S3' ? 'selected' : ''}}>S3</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="m_religion" class="form-label">Agama</label>
                                <select id="m_religion" name="m_religion" class="form-select select2" data-allow-clear="true">
                                    <option value="">Pilih</option>
                                    <option value="Islam"  {{optional($student_mother)->religion == 'Islam' ? 'selected' : ''}}>Islam</option>
                                    <option value="Kristen" {{optional($student_mother)->religion == 'Kristen' ? 'selected' : ''}}>Kristen</option>
                                    <option value="Katholik" {{optional($student_mother)->religion == 'Katholik' ? 'selected' : ''}}>Katholik</option>
                                    <option value="Protestan" {{optional($student_mother)->religion == 'Protestan' ? 'selected' : ''}}>Protestan</option>
                                    <option value="Budha" {{optional($student_mother)->religion == 'Budha' ? 'selected' : ''}}>Budha</option>
                                    <option value="Hindu" {{optional($student_mother)->religion == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="m_profession" class="form-label">Pekerjaan</label>
                                <input class="form-control" type="text" id="m_profession" name="m_profession" value="{{$student_mother->profession ?? ''}}" autofocus />
                            </div> 
                            <div class="mb-3 col-md-6">
                                <label for="m_income" class="form-label">Pendapatan</label>
                                <input class="form-control" type="text" id="m_income" name="m_income" value="{{$student_mother->income ?? ''}}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="m_whatsapp_phone">Nomor Whatsapp</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-phone"></i></span>
                                    <input type="text" id="m_whatsapp_phone" name="m_whatsapp_phone" class="form-control" value="{{$student_mother->whatsapp_phone ?? ''}}" />
                                </div>
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