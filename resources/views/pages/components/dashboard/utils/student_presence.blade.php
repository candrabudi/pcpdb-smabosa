<div class="card mb-4">
    <div class="card-body">
        <p class="card-text text-uppercase">Absensi Siswa</p>
        @foreach($student_presences as $sp)
        <small class="text-light fw-semibold">
            {{
                    ($sp->type_class == "seven") ? "Kelas 7" : 
                        (($sp->type_class == "eight") ? "Kelas 8" : 
                            (($sp->type_class == "nine") ? "Kelas 9" : "" ))
                }}
        </small>
        <div class="demo-inline-spacing mb-3">
            <ul class="list-group">
                <li class="list-group-item d-flex align-items-center">
                    <i class="ti ti-report-medical ti-sm me-2"></i>
                    Sakit : {{$sp->sick_one + $sp->sick_two}} 
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <i class="ti ti-license ti-sm me-2"></i>
                    Izin : {{$sp->permission_one + $sp->permission_two}} 
                </li>
                <li class="list-group-item d-flex align-items-center">
                    <i class="ti ti-clipboard-text ti-sm me-2"></i>
                    Tidak ada keterangan : {{$sp->alpa_one + $sp->alpa_two}} 
                </li>
            </ul>
        </div>
        @endforeach
    </div>
</div>