<div class="card mb-4">
    <div class="card-body">
        <small class="card-text text-uppercase">Informasi Data Diri</small>
        <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-user"></i><span class="fw-bold mx-2">Nama Lengkap:</span>
                <span>{{$user->full_name}}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-check"></i><span class="fw-bold mx-2">Status:</span>
                <span>Active</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-crown"></i><span class="fw-bold mx-2">Akun:</span>
                <span>Siswa</span>
            </li>
        </ul>
        <small class="card-text text-uppercase">Contacts</small>
        <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-phone-call"></i><span class="fw-bold mx-2">Nomor Handphone:</span>
                <span>{{$student->phone_number}}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-phone-call"></i><span class="fw-bold mx-2">Nomor Whatsapp:</span>
                <span>{{$student->whatsapp_phone}}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-mail"></i><span class="fw-bold mx-2">Email:</span>
                <span>{{$user->email}}</span>
            </li>
        </ul>
        <small class="card-text text-uppercase">Asal Sekolah</small>
        <ul class="list-unstyled mb-0 mt-3">
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-brand-angular text-danger me-2"></i>
                <div class="d-flex flex-wrap">
                    <span class="fw-bold me-2">Backend Developer</span><span>(126
                        Members)</span>
                </div>
            </li>
            <li class="d-flex align-items-center">
                <i class="ti ti-brand-react-native text-info me-2"></i>
                <div class="d-flex flex-wrap">
                    <span class="fw-bold me-2">React Developer</span><span>(98
                        Members)</span>
                </div>
            </li>
        </ul>
    </div>
</div>