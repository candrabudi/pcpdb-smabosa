@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Data Siswa</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table class="datatables-basic table" id="get-student">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Registrasi</th>
                                <th>NISN</th>
                                <th>Email</th>
                                <th>Nama Lengkap</th>
                                <th>Nomor Whatsapp</th>
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
                {data: 'no'},
                {data: 'nisn'},
                {data: 'registration_number'},
                {data: 'email'},
                {data: 'full_name'},
                {data: 'whatsapp_phone'},
                {
                    data: 'id',
                    render: function(id) {    
                        return '<button class="my-1 btn btn-warning btn-xs detail-student"  style="display: inline-block;" data-id="' + id + '"><i class="ti ti-edit me-1"></i> Detail</button>';
                    },
                },
            ],
        });
        $('#get-student').on('click', '.detail-student', function() {
            var id = $(this).data('id');
            window.location = '/bosa/admin/siswa/detail/' + encodeURIComponent(id)
        });
    });
</script>
@endsection