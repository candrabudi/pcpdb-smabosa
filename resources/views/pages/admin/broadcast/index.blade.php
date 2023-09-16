@extends('layouts.app')
@section('title')
List Broadcast
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Broadcast /</span> List</h4>
    <div class="card">
        <div class="card-header p-3 d-flex mb-4">
            <h5 class="align-self-center m-0">List Broadcast</h5>
            <a href="{{ route('admin.broadcast.create') }}" class="d-inline-flex btn btn-primary ms-auto">Tambah Broadcast</a>
        </div>
        <div class="card-datatable text-nowrap">
            <table class="datatables-ajax table" id="get-broadcast">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th width="120">Judul</th>
                        <th width="50%">Keterangan</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $(function() {
        var table = $('#get-broadcast').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.broadcast.datatable') !!}',
            columns: [
                {
                    data: 'no'
                },
                {
                    data: 'title'
                },
                {
                    data: 'notes',
                    render: function(notes) {
                        return "<p class='text-wrap'>"+ notes+"</p>";
                    },
                },
                {
                    data: 'file',
                    render: function(file, type, row) {
                        if(row.is_file == true){
                            return "<a class='btn btn-primary btn-sm' href="+file+" download>Download File</a>";
                        }else{
                            return "<span class='badge bg-label-dark'>Tidak Ada File</span>";
                        }
                    },
                },
                {
                    data: 'id',
                    render: function(id) {
                        return '<button class="my-1 btn btn-warning btn-xs edit-broadcast"  style="display: inline-block;" data-id="' + id + '"><i class="ti ti-edit me-1"></i> Edit</button>&nbsp;<button class="my-1 btn btn-danger btn-xs delete-broadcast"  style="display: inline-block;" data-id="' + id + '"><i class="ti ti-trash me-1"></i> Delete</button>';
                    },
                }
            ],
        });
        $('#get-broadcast').on('click', '.edit-broadcast', function() {
            var id = $(this).data('id');
            window.location = '/bosa/admin/broadcast/edit/' + encodeURIComponent(id)
        }); 
    });
</script>
<script>
    $(function() {
        $('#get-broadcast').on('click', '.delete-broadcast', function() {
            var id = $(this).data('id');

            Swal.fire({
                text: 'Apakah kamu yakin mau menghapus data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'btn btn-primary me-2',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false,
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading(),
                preConfirm: () => {
                    return $.ajax({
                        url: '/bosa/admin/broadcast/delete/'+id,
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                           return response;
                        },
                        error: function() {
                            Swal.showValidationMessage(
                                'Request failed'
                            )
                        }
                    });
                },
            }).then(function(result) {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Dihapus!',
                        text: 'Data kamu berhasil di hapus. kamu akan segera dialihkan',
                        timer: 2300,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        },
                        customClass: {
                            confirmButton: 'btn btn-success d-none'
                        }
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            window.location = '/bosa/admin/broadcast'
                        }
                    });
                }
            });
        });
    });
</script>
@endsection

