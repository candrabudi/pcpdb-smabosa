@props(['student', 'classType', 'semester'])

<div class="mb-3 col-md-12">
    <label for="{{ $classType }}_sick_{{ $semester }}" class="form-label">Sakit Semester {{ $semester == 'one' ? '1' : '2' }}</label>
    <input class="form-control" type="number" id="{{ $classType }}_sick_{{ $semester }}" name="{{ $classType }}_sick_{{ $semester }}" value="{{ $student->{'sick_'.$semester} ?? '' }}" autofocus />
</div>
<div class="mb-3 col-md-12">
    <label for="{{ $classType }}_permission_{{ $semester }}" class="form-label">Izin Semester {{ $semester == 'one' ? '1' : '2' }}</label>
    <input class="form-control" type="number" id="{{ $classType }}_permission_{{ $semester }}" name="{{ $classType }}_permission_{{ $semester }}" value="{{ $student->{'permission_'.$semester} ?? '' }}" autofocus />
</div>
<div class="mb-3 col-md-12">
    <label for="{{ $classType }}_alpa_{{ $semester }}" class="form-label">Tanpa Keterangan Semester {{ $semester == 'one' ? '1' : '2' }}</label>
    <input class="form-control" type="number" id="{{ $classType }}_alpa_{{ $semester }}" name="{{ $classType }}_alpa_{{ $semester }}" value="{{ $student->{'alpa_'.$semester} ?? '' }}" autofocus />
</div>
