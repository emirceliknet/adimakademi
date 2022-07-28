<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="#">
            <span class="align-middle">Adım Akademi</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item @if (Route::currentRouteName() == 'home') active @endif">
                <a class="sidebar-link" href="{{ route('home') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Genel Görünüm</span>
                </a>
            </li>

            <li class="sidebar-header">
                Kullanıcı ve Yetki işlemleri
            </li>
            <li class="sidebar-item @if (Route::currentRouteName() == 'users') active @endif">
                <a class="sidebar-link" href="{{ route('users') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Kullanıcılar
                    </span>
                </a>
            </li>

            <li class="sidebar-item @if (Route::currentRouteName() == 'roles') active @endif">
                <a class="sidebar-link" href="{{ route('roles') }}">
                    <i class="align-middle" data-feather="trending-up"></i> <span class="align-middle">Roller
                    </span>
                </a>
            </li>

            <li class="sidebar-item @if (Route::currentRouteName() == 'permissions') active @endif">
                <a class="sidebar-link" href="{{ route('permissions') }}">
                    <i class="align-middle" data-feather="shield"></i> <span class="align-middle">Yetkiler
                    </span>
                </a>
            </li>
        </ul>


    </div>
</nav>
