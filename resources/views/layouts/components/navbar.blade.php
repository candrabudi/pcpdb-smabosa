<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-xxl">
        <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
            <a href="/" class="app-brand-link gap-2">
                <span class="app-brand-text demo menu-text fw-bold">
                    <img src="https://smabosa-yogya.sch.id/asset_fe/images/logo/logo.webp" width="150" alt="">
                </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                <i class="ti ti-x ti-sm align-middle"></i>
            </a>
        </div>

        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="ti ti-menu-2 ti-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                @if(Auth::user()->role_name == "Student")
                    @if(Auth::user()->student->status == "diterima")
                        <span class="badge bg-label-success p-2">Di Terima</span>
                    @elseif(Auth::user()->student == "ditolak")
                        <span class="badge bg-label-danger p-2">Di Tolak</span>
                    @else
                        <span class="badge bg-label-warning p-2">Tahap Pendaftaran</span>
                    @endif
                @endif
                <a class="btn btn-danger" href="{{ route('logout') }}" style="margin-left: 10px;" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</nav>