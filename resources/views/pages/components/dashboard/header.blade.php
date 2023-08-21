<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="user-profile-header-banner">
                <img src="https://smabosa-yogya.sch.id/images_upload/image_slider/image_slider_1691734417.webp" alt="Banner image" class="rounded-top" />
            </div>
            <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                    <img src="../../assets/img/avatars/14.png" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                </div>
                <div class="flex-grow-1 mt-3 mt-sm-5">
                    <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                        <div class="user-profile-info">
                            <h4>{{$user->full_name}}</h4>
                            <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                <li class="list-inline-item"><i class="ti ti-calendar"></i>
                                    Bergabung pada {{ \Carbon\Carbon::parse($user->created_at)->formatLocalized('%d %B %Y') }}</li>
                            </ul>
                        </div>
                        <a href="{{route('account_setting')}}" class="btn btn-primary">
                            <i class="ti ti-gear me-1"></i>Pengaturan Akun
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>