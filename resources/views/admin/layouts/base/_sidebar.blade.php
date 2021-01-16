<!-- Side Navbar -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center">
                <h2 class="h5">{{auth()->user()->username}}</h2><span>System Admin</span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo"><a href="/index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <h5 class="sidenav-heading">Main</h5>
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li><a href="#usersdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>Users </a>
                    <ul id="usersdropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="{{route('users.create')}}">Add User</a></li>
                        <li><a href="{{route('users.index')}}">Show Users</a></li>
                    </ul>
                </li>
                <li><a href="#questionnairesdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-padnote"></i>{{__('Questionnaires ')}}</a>
                    <ul id="questionnairesdropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="#">Show Questionnaires</a></li>
                    </ul>
                </li>
                <li><a href="#projectsdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-website"></i>{{__('Projects')}}</a>
                    <ul id="projectsdropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="#">Create Project</a></li>
                        <li><a href="#">Show Projects</a></li>
                    </ul>
                </li>
                <li><a href="#contactsdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-address-book"></i>{{__('Contact')}}</a>
                    <ul id="contactsdropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="{{route('contacts.index')}}">Show</a></li>

                    </ul>
                </li>
                <li><a href="#teamsdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-users"></i>{{__('Team')}}</a>
                    <ul id="teamsdropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="{{route('teams.index')}}">Show Team</a></li>
                    </ul>
                </li>
                <li><a href="#designersdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-align-center"></i>{{__('Designers')}}</a>
                    <ul id="designersdropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="{{route('designers.create')}}">Add Designer</a></li>
                        <li><a href="{{route('designers.index')}}">Show Designers</a></li>
                    </ul>
                </li>
                <li><a href="#modelsdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-picture-o"></i>{{__('3D Models')}}</a>
                    <ul id="modelsdropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="{{route('model.create')}}">Add Designer</a></li>
                        <li><a href="{{route('model.index')}}">Show Designers</a></li>
                    </ul>
                </li>
                            </ul>
        </div>
        <div class="admin-menu">
            <h5 class="sidenav-heading">Second menu</h5>
            <ul id="side-admin-menu" class="side-menu list-unstyled">
                <li> <a href="#"> <i class="icon-screen"> </i>Demo</a></li>
                <li> <a href="#"> <i class="icon-flask"> </i>Demo
                        <div class="badge badge-info">Special</div></a></li>
                <li> <a href=""> <i class="icon-flask"> </i>Demo</a></li>
                <li> <a href=""> <i class="icon-picture"> </i>Demo</a></li>
            </ul>
        </div>
    </div>
</nav>