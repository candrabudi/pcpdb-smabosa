<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="user-profile-header-banner">
                <img src="https://smabosa-yogya.sch.id/images_upload/image_slider/image_slider_1691734417.webp" alt="Banner image" class="rounded-top" />
            </div>
            <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                    <img src="{{ $student_document ? asset('storage/'.$student_document->pas_photo) : 'https://cdn-icons-png.flaticon.com/512/2554/2554632.png' }}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                </div>
                <div class="flex-grow-1 mt-3 mt-sm-5">
                    <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                        <div class="user-profile-info">
                            <h4>{{$user->full_name}}</h4>
                            <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                <li class="list-inline-item"><i class="ti ti-calendar"></i>
                                    Bergabung pada {{tanggal_indonesia($user->created_at)}}</li>
                            </ul>
                            <div class="row mt-3 col-sm-8">
                                <div class="col-4">
                                    @if($student->status == "diterima")
                                        <span class="badge bg-label-success">Diterima</span>
                                    @elseif($student->status == "ditolak")
                                        <span class="badge bg-label-danger">Diterima</span>
                                    @else
                                        <span class="badge bg-label-warning">Diterima</span>
                                    @endif
                                </div>
                                <div class="col-8 text-end">
                                    @if($student->status != "daftar")
                                        <a href="{{asset('storage/'.$student->file_path)}}" class="btn btn-xs p-2 btn-primary">Download File</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(auth()->user()->role_name != 'Admin')
                        <div class="row">
                            <a href="{{route('page_personal_data')}}" class="btn btn-primary">
                                <i class="ti ti-gear me-1"></i>Isi Formulir
                            </a>
                            <a href="{{route('student_formulir')}}" class="btn mt-3 btn-primary">
                                <i class="ti ti-file me-1"></i>Download Formulir
                            </a>
                        </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>