<ul class="nav nav-pills flex-column flex-md-row mb-4">
    <li class="nav-item">
        <a class="nav-link {{$page == 'account' ? 'active' : ''}}" href="{{route('page_personal_data')}}"><i class="ti-xs ti ti-users me-1"></i> Data Diri</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$page == 'parent' ? 'active' : ''}}" href="{{route('page_parent_data')}}"><i class="ti-xs ti ti-id me-1"></i>Orang Tua</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$page == 'wali' ? 'active' : ''}}" href="{{route('page_wali_data')}}"><i class="ti-xs ti ti-id me-1"></i>Wali</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$page == 'presence' ? 'active' : ''}}" href="{{route('page_presence_data')}}"><i class="ti-xs ti ti-file-description me-1"></i> Absensi Peserta Didik</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$page == 'score' ? 'active' : ''}}" href="{{route('page_score_data')}}"><i class="ti-xs ti ti-bookmarks me-1"></i> Nilai Peserta Didik</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$page == 'document' ? 'active' : ''}}" href="{{route('page_document_data')}}"><i class="ti-xs ti ti-link me-1"></i> Dokumen Peserta Didik</a>
    </li>
</ul>
@if(count($errors) > 0)
<div class="alert alert-danger alert-dismissible" role="alert">
    <h5 class="alert-heading mb-2">Maaf Ada Kesalahan Silahkan Check Kembali!</h5>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    <p class="mb-2">{{ session('success') }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif