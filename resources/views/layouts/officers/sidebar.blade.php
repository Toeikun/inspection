<button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
    <i class="ion-close"></i>
</button>

<!-- LOGO -->
<div class="topbar-left">
    <div class="text-center">
        <!--<a href="index.html" class="logo">Admiry</a>-->
        <a href="{{ url('/staff') }}" class="logo"><img src="{{ asset('images/siam-logo.png') }}" height="50" alt="logo"></a>
    </div>
</div>

<div class="sidebar-inner slimscrollleft">

    <div class="user-details">
        <div class="text-center">
            <img src="{{ asset('images/users/avatar-1.jpg') }}" alt="" class="rounded-circle">
        </div>
        <div class="user-info">
            <h4 class="font-16">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
            <span class="text-muted user-status"><i class="fa fa-dot-circle-o text-success"></i> Online</span>
        </div>
    </div>

    <div id="sidebar-menu">
        <ul>
            <li>
                <a href="{{ url('officer/dashboard') }}" class="waves-effect">
                    <i class="fa fa-dashboard"></i>
                    <span> Dashboard</span>
                </a>
            </li>
            <li>
                <a class="waves-effect" href="{{ route('officer.logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-logout m-r-5 text-muted"></i> Sign Out
                </a>
                <form id="logout-form" action="{{ route('officer.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div> <!-- end sidebarinner -->