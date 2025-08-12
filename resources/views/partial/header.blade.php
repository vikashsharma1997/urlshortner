<div class="az-header">
    <div class="container">
        <div class="az-header-left">
            <a href="/" class="az-logo"><span></span> azia</a>
            <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-header-menu">
            <div class="az-header-menu-header">
                <a href="/" class="az-logo"><span></span> azia</a>
                <a href="" class="close">&times;</a>
            </div><!-- az-header-menu-header -->
            <ul class="nav">
                <li class="nav-item">
                    <a href="/" class="nav-link">Dashboard</a>
                </li>
                @if(isSuperAdmin())
                <li class="nav-item">
                    <a href="{{ route('clients') }}" class="nav-link">Clients</a>
                </li>
                @endif
                @if(isAdmin())
                <li class="nav-item">
                    <a href="{{ route('members') }}" class="nav-link">Members</a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('generatedshorturls') }}" class="nav-link">Generated Short URLs</a>
                </li>
            </ul>
        </div><!-- az-header-menu -->
        <div class="az-header-right">
            <div class="dropdown az-profile-menu">
                <a href="" class="az-img-user"><img src="{{ asset('assets/placeholder.png') }}" alt=""></a>
                <div class="dropdown-menu">
                    <div class="az-dropdown-header d-sm-none">
                        <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                    </div>
                    <div class="az-header-profile">
                        <h6>{{ auth()->user()->name }}</h6>
                        <span>Role: {{ auth()->user()->role->name }}</span>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="typcn typcn-power-outline"></i> Sign Out
                    </a>
                </div><!-- dropdown-menu -->
            </div>
        </div><!-- az-header-right -->
    </div><!-- container -->
</div><!-- az-header -->
