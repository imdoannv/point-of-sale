<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">POS</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title-content')</li>
        </ol>
    </nav>
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Search -->
    <div class="intro-x relative mr-3 sm:mr-6">
        <div class="search hidden sm:block">
            <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
            <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
        </div>
        <a class="notification sm:hidden" href="#"> <i data-lucide="search" class="notification__icon dark:text-slate-500"></i> </a>
        <div class="search-result">

        </div>
    </div>
    <!-- END: Search -->

    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8">
        @if (Auth::user())
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
{{--            <img alt="Midone - HTML Admin Template" src="{{asset('admin/dist/images/profile-5.jpg')}}">--}}
            <img class="rounded-circle" style="width:30px;height:30px" src="{{ auth()->user()->avatar ? asset(auth()->user()->avatar) : asset('admin/images/no-image-user.jpeg') }}" alt="Header Avatar">

        </div>
        <div class="dropdown-menu w-56">
            <ul class="dropdown-content bg-primary text-white">
                <li class="p-2">
                    <div class="font-medium">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">{{ Auth::user()->role }}</div>

                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                @if (Auth::user()->role === 'admin')
                    <li>
                        <a href="{{ route('home-admin') }}" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Vào trang quản lý</a>
                    </li>
                @endif
                <li>
                    <a href="#" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Hồ sơ</a>
                </li>
                <li>
                    <a href="#" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Đổi mật khẩu </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                    <a class="dropdown-item hover:bg-white/5" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Đăng xuất
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
    @endif
    <!-- END: Account Menu -->
</div>
