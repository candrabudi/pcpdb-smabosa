@extends('layouts.app')
@section('title')
Edit Broadcast
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Broadcast /</span> Edit</h4>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Broadcast</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.broadcast.update', $broadcast->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Judul Broadcast</label>
                            <input type="text" class="form-control" id="basic-default-fullname" value="{{$broadcast->title}}" name="title" required />
                        </div>
                         <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Keterangan Broadcast</label>
                            <textarea name="notes" class="form-control" id="" cols="30" rows="10" required>{{$broadcast->notes}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Upload File (Opsional) (max 2mb)</label>
                            <input type="file" class="form-control" id="basic-default-fullname" name="file"  />
                        </div>
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection