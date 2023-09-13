@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Data Siswa</h4>

    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
                <div class="card-title mb-0">
                    <h5 class="mb-0">Jumlah Calon Siswa</h5>
                </div>
            </div>
            <div class="card-body mt-5">
                <div class="border rounded p-3 mt-2">
                    <div class="row gap-4 gap-sm-0">
                        <div class="col-12 col-sm-4">
                            <div class="d-flex gap-2 align-items-center">
                                <div class="badge rounded bg-label-primary p-1">
                                    <i class="ti ti-gender-male ti-sm"></i>
                                </div>
                                <h6 class="mb-0">Laki-laki</h6>
                            </div>
                            <h4 class="my-2 pt-1">{{$student_man}}</h4>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="d-flex gap-2 align-items-center">
                                <div class="badge rounded bg-label-info p-1"><i class="ti ti-gender-female ti-sm"></i></div>
                                <h6 class="mb-0">Perempuan</h6>
                            </div>
                            <h4 class="my-2 pt-1">{{$student_woman}}</h4>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="d-flex gap-2 align-items-center">
                                <div class="badge rounded bg-label-danger p-1">
                                    <i class="ti ti-receipt ti-sm"></i>
                                </div>
                                <h6 class="mb-0">Total</h6>
                            </div>
                            <h4 class="my-2 pt-1">{{$student_woman + $student_man}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table class="datatables-basic table" id="get-student">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Regis</th>
                                <th>NISN</th>
                                <th>Email</th>
                                <th>Nama Lengkap</th>
                                <th>Nomor Whatsapp</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        var table = $('#get-student').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.student.datatable') !!}',
            columns: [
                {
                    data: 'no'
                },
                {
                    data: 'registration_number'
                },
                {
                    data: 'nisn'
                },
                {
                    data: 'email'
                },
                {
                    data: 'full_name'
                },
                {
                    data: 'whatsapp_phone'
                },
                {
                    data: 'status'
                },
                {
                    data: 'id',
                    render: function(id) {
                        return '<button class="my-1 btn btn-info btn-xs detail-student"  style="display: inline-block;" data-id="' + id + '"><i class="ti ti-edit me-1"></i> Detail</button>&nbsp;<button class="my-1 btn btn-warning btn-xs edit-status-student"  style="display: inline-block;" data-id="' + id + '"><i class="ti ti-edit me-1"></i> Edit Status</button>';
                    },
                }
            ],
        });
        $('#get-student').on('click', '.detail-student', function() {
            var id = $(this).data('id');
            window.location = '/bosa/admin/siswa/detail/' + encodeURIComponent(id)
        }); 
        $('#get-student').on('click', '.edit-status-student', function() {
            var id = $(this).data('id');
            window.location = '/bosa/admin/siswa/edit/' + encodeURIComponent(id)
        });
    });
</script>
@endsection