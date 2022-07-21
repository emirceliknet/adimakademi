<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="#">
            <span class="align-middle">Adım Akademi</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item @if (Route::currentRouteName() == 'home') active @endif">
                <a class="sidebar-link" href="{{route('home')}}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Genel Görünüm</span>
                </a>
            </li>

            <li class="sidebar-header">
                Kullanıcı işlemleri
            </li>
            <li class="sidebar-item @if (Route::currentRouteName() == 'users') active @endif">
                <a class="sidebar-link" href="{{ route('users') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Kullanıcıları
                        listele</span>
                </a>
            </li>
        </ul>


    </div>
</nav>
