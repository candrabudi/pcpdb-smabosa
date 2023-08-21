@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <div class="row">
        <div class="col-md-12">
            @include('pages.components.account_setting.account_pills')

            <div class="card mb-4">
                <h5 class="card-header">Data Absensi Kelas 7</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{route('store_presence_seven')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 col-md-12">
                                    <label for="s_sick_one" class="form-label">Sakit Semester 1</label>
                                    <input class="form-control" type="number" id="s_sick_one" name="s_sick_one" value="{{$student_seven->sick_one ?? '0'}}" autofocus />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="s_permission_one" class="form-label">Izin Semester 1</label>
                                    <input class="form-control" type="number" id="s_permission_one" name="s_permission_one" value="{{$student_seven->permission_one ?? '0'}}" autofocus />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="s_alpa_one" class="form-label">Alpa Semester 1</label>
                                    <input class="form-control" type="number" id="s_alpa_one" name="s_alpa_one" value="{{$student_seven->alpa_one ?? '0'}}" autofocus />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 col-md-12">
                                    <label for="s_sick_two" class="form-label">Sakit Semester 2</label>
                                    <input class="form-control" type="number" id="s_sick_two" name="s_sick_two" value="{{$student_seven->sick_two ?? '0'}}" autofocus />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="s_permission_two" class="form-label">Izin Semester 2</label>
                                    <input class="form-control" type="number" id="s_permission_two" name="s_permission_two" value="{{$student_seven->permission_two ?? '0'}}" autofocus />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="s_alpa_two" class="form-label">Alpa Semester 2</label>
                                    <input class="form-control" type="number" id="s_alpa_two" name="s_alpa_two" value="{{$student_seven->alpa_two ?? '0'}}" autofocus />
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
                <h5 class="card-header">Data Absensi Kelas 8</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{route('store_presence_eight')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 col-md-12">
                                    <label for="e_sick_one" class="form-label">Sakit Semester 1</label>
                                    <input class="form-control" type="number" id="e_sick_one" name="e_sick_one" value="{{$student_eight->sick_one ?? '0'}}" autofocus />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="e_permission_one" class="form-label">Izin Semester 1</label>
                                    <input class="form-control" type="number" id="e_permission_one" name="e_permission_one" value="{{$student_eight->permission_one ?? '0'}}" autofocus />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="e_alpa_one" class="form-label">Alpa Semester 1</label>
                                    <input class="form-control" type="number" id="e_alpa_one" name="e_alpa_one" value="{{$student_eight->alpa_one ?? '0'}}" autofocus />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 col-md-12">
                                    <label for="e_sick_two" class="form-label">Sakit Semester 2</label>
                                    <input class="form-control" type="number" id="e_sick_two" name="e_sick_two" value="{{$student_eight->sick_two ?? '0'}}" autofocus />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="e_permission_two" class="form-label">Izin Semester 2</label>
                                    <input class="form-control" type="number" id="e_permission_two" name="e_permission_two" value="{{$student_eight->permission_two ?? '0'}}" autofocus />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="e_alpa_two" class="form-label">Alpa Semester 2</label>
                                    <input class="form-control" type="number" id="e_alpa_two" name="e_alpa_two" value="{{$student_eight->alpa_two ?? '0'}}" autofocus />
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
                <h5 class="card-header">Data Absensi Kelas 9</h5>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{route('store_presence_nine')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 col-md-12">
                                    <label for="n_sick_one" class="form-label">Sakit Semester 1</label>
                                    <input class="form-control" type="number" id="n_sick_one" name="n_sick_one" value="{{$student_nine->sick_one ?? '0'}}" autofocus />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="n_permission_one" class="form-label">Izin Semester 1</label>
                                    <input class="form-control" type="number" id="n_permission_one" name="n_permission_one" value="{{$student_nine->permission_one ?? '0'}}" autofocus />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="n_alpa_one" class="form-label">Alpa Semester 1</label>
                                    <input class="form-control" type="number" id="n_alpa_one" name="n_alpa_one" value="{{$student_nine->alpa_one ?? '0'}}" autofocus />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 col-md-12">
                                    <label for="n_sick_two" class="form-label">Sakit Semester 2</label>
                                    <input class="form-control" type="number" id="n_sick_two" name="n_sick_two" value="{{$student_nine->sick_two ?? '0'}}" autofocus />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="n_permission_two" class="form-label">Izin Semester 2</label>
                                    <input class="form-control" type="number" id="n_permission_two" name="n_permission_two" value="{{$student_nine->permission_two ?? '0'}}" autofocus />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="n_alpa_two" class="form-label">Alpa Semester 2</label>
                                    <input class="form-control" type="number" id="n_alpa_two" name="n_alpa_two" value="{{$student_nine->alpa_two ?? '0'}}" autofocus />
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