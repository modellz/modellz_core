<nav  class="navbar navbar-expand-lg navbar-expand-md navbar-light fixed-top bg-white p-0 shadow">
    <a   href="javascript:void(0)" id="IdTrigSide" class="px-3" onclick="openNav()"><i class="fa fa-cogs fa-lg"></i></a>
    <strong   class="ml-2" id="IdNumOfRows" style="font-size:16px;color: dodgerblue;"><img src="{{asset('storage/logo.png')}}" width="80px"> | Dashboard</strong>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-lg-flex d-md-flex  justify-content-lg-between justify-content-md-between collapse navbar-collapse py-4 py-sm-4 py-md-0 py-lg-0" id="myNavbar">
                <span class="py-2 py-lg-2 py-md-2">
                    <!-- <a href="#" id="IdSelectAll" class="px-3 px-lg-3 px-md-3" title="SelectAll"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></a>-->
                </span>
        <span class="p-md-2 p-lg-2 mr-2 mr-sm-2 mr-lg-4 float-right">
                    <!-- Notifications: style can be found in dropdown.less
                    <a href="#"  class="px-3 px-lg-3 px-md-3"><i class="fa fa-bell fa-lg" aria-hidden="true"></i></a> -->
                    <a href="#"  class="px-3 px-lg-3 px-md-3" title="{{'Logged in as '.session('public_name')}}"><i class="fa fa-user-o fa-lg" aria-hidden="true"></i><strong> {{' '.session('public_name')}}</strong></a>
                    <a href="/public/logout"  class="px-3 " title="Log out" ><i class="fa fa-power-off fa-lg" aria-hidden="true"></i></a>
                </span>
    </div>
</nav>