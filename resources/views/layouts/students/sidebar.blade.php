<button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
    <i class="ion-close"></i>
</button>

<!-- LOGO -->
<div class="topbar-left">
    <div class="text-center">
        <!--<a href="index.html" class="logo">Admiry</a>-->
        <a class="logo"><img src="{{ asset('images/siam-logo.png') }}" height="50" alt="logo"></a>
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
            @if (Auth::user()->status_id == 1)
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-file-word-o"></i> <span>Word</span> </a>
                <ul class="list-unstyled">
                    <li><a href="{{ url('student/list') }}"><i class="mdi mdi-playlist-check"></i> List</a></li>
                    <li><a href="{{ url('student/word') }}"><i class="fa fa-cloud-upload"></i> Upload</a></li>
                </ul>
            </li>
                {{-- @if (Auth::user()->status_id == 6) --}}
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-file-pdf-o"></i> <span>PDF</span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('student/listpdf') }}"><i class="mdi mdi-playlist-check"></i> List</a></li>
                        <li><a href="{{ url('student/pdf') }}"><i class="fa fa-cloud-upload"></i> Upload</a></li>
                    </ul>
                </li>
                {{-- @endif --}}
            @endif
            <li>
                <a class="waves-effect" href="{{ route('staff.logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-logout m-r-5 text-muted"></i> Sign Out
                </a>
                <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div> <!-- end sidebarinner -->