<ul class="nav nav-pills flex-column flex-md-row mb-4">
    <li class="nav-item">
        <a class="nav-link {{$page == 'account' ? 'active' : ''}}" href="{{route('account_setting')}}"><i class="ti-xs ti ti-users me-1"></i> Data Diri</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$page == 'parent' ? 'active' : ''}}" href="{{route('page_parent')}}"><i class="ti-xs ti ti-lock me-1"></i>Orang Tua</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$page == 'presence' ? 'active' : ''}}" href="{{route('page_presence')}}"><i class="ti-xs ti ti-file-description me-1"></i> Absensi Siswa</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$page == 'score' ? 'active' : ''}}" href="{{route('page_score')}}"><i class="ti-xs ti ti-bell me-1"></i> Nilai Siswa</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$page == 'document' ? 'active' : ''}}" href="{{route('page_document')}}"><i class="ti-xs ti ti-link me-1"></i> Dokumen Siswa</a>
    </li>
</ul>