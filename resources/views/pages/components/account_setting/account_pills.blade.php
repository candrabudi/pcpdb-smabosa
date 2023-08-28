<ul class="nav nav-pills flex-column flex-md-row mb-4">
    <li class="nav-item">
        <a class="nav-link {{$page == 'account' ? 'active' : ''}}" href="{{route('page_personal_data')}}"><i class="ti-xs ti ti-users me-1"></i> Data Diri</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$page == 'parent' ? 'active' : ''}}" href="{{route('page_parent_data')}}"><i class="ti-xs ti ti-id me-1"></i>Orang Tua</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$page == 'presence' ? 'active' : ''}}" href="{{route('page_presence_data')}}"><i class="ti-xs ti ti-file-description me-1"></i> Absensi Siswa</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$page == 'score' ? 'active' : ''}}" href="{{route('page_score_data')}}"><i class="ti-xs ti ti-bookmarks me-1"></i> Nilai Siswa</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$page == 'document' ? 'active' : ''}}" href="{{route('page_document_data')}}"><i class="ti-xs ti ti-link me-1"></i> Dokumen Siswa</a>
    </li>
</ul>