<div class="card mb-4">
    <div class="card-body">
        <p class="card-text text-uppercase">Nilai Siswa</p>
        <ul class="list-unstyled mb-0">
            @foreach($student_scores as $ss)
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-certificate-2"></i><span class="fw-bold mx-2">
                {{
                    ($ss->type_class == "seven") ? "Sakit Kelas 7" : 
                        (($ss->type_class == "eight") ? "Kelas 8" : 
                            (($ss->type_class == "nine") ? "Kelas 9" : "" ))
                }}    
                :</span> <span>{{ $ss->first_semester + $ss->second_semester }}</span>
            </li>
            @endforeach
        </ul>
    </div>
</div>