<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">
            @if(auth()->user()->role_name == "Student")
            <li class="menu-item">
                <a href="/home" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Dashboards">Dashboards</div>
                </a>
            </li>
            @else
            <li class="menu-item">
                <a href="/bosa/admin/dashboard" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Dashboards">Dashboards</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="/bosa/admin/broadcast" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-file"></i>
                    <div data-i18n="Broadcast">Broadcast</div>
                </a>
            </li>
            @endif
        </ul>
    </div>
</aside>