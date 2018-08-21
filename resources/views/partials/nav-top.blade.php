<!-- nav-top.blade.php -->
<!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="images/notebook.png">
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
               @guest
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img src="images/login.png" width="70">>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{ route('login') }}"><img src="images/login2.png" width="20"> Login</a></li>
                </ul>
               @else
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <!-- <i class="fa fa-user fa-3x"></i> -->
                        @if(Auth::user()->role == 'admin')
                        <img src="images/admin.png" width="50">
                        @endif
                        @if(Auth::user()->role == 'teacher')
                        <img src="images/teacheruser.png" width="50">
                        @endif
                        @if(Auth::user()->role == 'student')
                        <img src="images/studentuser.png" width="50">
                        @endif
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ route('home') }}"><img src="images/home.png" width="20"> Home</a>
                        </li>
                        @if(Auth::user()->role == 'admin')
                        <li><a href="{{ route('registeruser') }}"><img src="images/register.png" width="20"> Register User</a>
                        @endif
                        </li>
                        <li><a href="{{ route('editprofile') }}"><img src="images/editprofile.png" width="20"> Edit Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li> 
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"><img src="images/exit.png" width="20"> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                    @endguest
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->