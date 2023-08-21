<div class="card mb-4">
    <div class="card-body">
        <small class="card-text text-uppercase">Informasi Data Ayah</small>
        <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-man"></i><span class="fw-bold mx-2">Nama Ayah:</span>
                <span>{{$student_parents[0]->parent_name ?? ''}}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-ballon"></i><span class="fw-bold mx-2">Tanggal Lahir:</span>
                <span>{{$student_parents[0]->birth_date ?? ''}}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-pray"></i><span class="fw-bold mx-2">Agama:</span>
                <span>{{$student_parents[0]->religion ?? ''}}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-books"></i><span class="fw-bold mx-2">Pendidikan:</span>
                <span>{{$student_parents[0]->education ?? ''}}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-file-description"></i><span class="fw-bold mx-2">Pekerjaan:</span>
                <span>{{$student_parents[0]->profession ?? ''}}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-wallet"></i><span class="fw-bold mx-2">Pendapatan:</span>
                <span>{{$student_parents[0]->income ?? ''}}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-phone-call"></i><span class="fw-bold mx-2">Nomor Whatsapp:</span>
                <span>{{$student_parents[0]->whatsapp_phone ?? ''}}</span>
            </li>
        </ul>
        <small class="card-text text-uppercase">Informasi Data Ibu</small>
        <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-woman"></i><span class="fw-bold mx-2">Nama Ibu:</span>
                <span>{{$student_parents[1]->parent_name ?? ''}}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-ballon"></i><span class="fw-bold mx-2">Tanggal Lahir:</span>
                <span>{{$student_parents[1]->birth_date ?? ''}}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-pray"></i><span class="fw-bold mx-2">Agama:</span>
                <span>{{$student_parents[1]->religion ?? ''}}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-books"></i><span class="fw-bold mx-2">Pendidikan:</span>
                <span>{{$student_parents[1]->education ?? ''}}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-file-description"></i><span class="fw-bold mx-2">Pekerjaan:</span>
                <span>{{$student_parents[1]->profession ?? ''}}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-wallet"></i><span class="fw-bold mx-2">Pendapatan:</span>
                <span>{{$student_parents[1]->income ?? ''}}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-phone-call"></i><span class="fw-bold mx-2">Nomor Whatsapp:</span>
                <span>{{$student_parents[1]->whatsapp_phone ?? ''}}</span>
            </li>
        </ul>
    </div>
</div>