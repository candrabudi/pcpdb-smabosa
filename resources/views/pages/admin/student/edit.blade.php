@extends('layouts.app')
@section('title')
Detail Siswa
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Siswa /</span> Edit
    </h4>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Status Siswa</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.student.update', $student->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Upload File</label>
                            <input type="file" class="form-control" id="basic-default-fullname" name="file" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Status Siswa</label>
                            <select name="status" class="form-control" id="">
                                <option value="">Pilih Status</option>
                                <option value="diterima">Diterima</option>
                                <option value="ditolak">Ditolak</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection