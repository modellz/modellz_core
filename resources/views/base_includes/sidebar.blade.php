<nav id="mySidenav" class="d-none d-block sidenav">
    <a href="#"  class="px-3 px-lg-3 px-md-3 mt-4 py-3" title="{{'Logged in as '.session('public_name')}}" style="display: block;background-color: lightslategrey;color: black;"><i class="fa fa-user fa-lg" aria-hidden="true">{{'  '.session('public_name')}}</i>
    </a>
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            @if(session('public_name'))
                <li class="nav-item">
                    <a  href="/public" class="nav-link" onclick="openNav()"  style="font-size: 14px;">
                        <i class="fa fa-home sideicon pr-2"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/public/profile" class="nav-link" onclick="openNav()" style="font-size: 14px;">
                    <i class="fa  fa-user sideicon pr-2"></i>User Profile</a>
                </li>
                <li class="nav-item">
                    <a href="/public/history" class="nav-link" onclick="openNav()" style="font-size: 14px;">
                        <i class="fa  fa-history sideicon pr-2"></i>history of activity</a>
                </li>
            @endif
        </ul>
    </div>
</nav>