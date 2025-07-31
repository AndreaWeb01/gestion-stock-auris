<div class="navbar-custom">
                <div class="topbar">
                    <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

                        <!-- Brand Logo -->
                        <div class="logo-box">
                            <!-- Brand Logo Light -->
                            <a href="index.html" class="logo-light">
                                <img src="{{url('assets/images/logo-light.png')}}" alt="logo" class="logo-lg" height="20">
                                <img src="{{url('assets/images/logo-sm.png')}}" alt="small logo" class="logo-sm" height="20">
                            </a>

                            <!-- Brand Logo Dark -->
                            <a href="index.html" class="logo-dark">
                                <img src="{{url('assets/images/logo-dark.png')}}" alt="dark logo" class="logo-lg" height="20">
                                <img src="{{url('assets/images/logo-sm.png')}}" alt="small logo" class="logo-sm" height="20">
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu waves-effect waves-dark rounded-circle">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center gap-2">

                        <li class="d-none d-md-inline-block">
                            <a class="nav-link waves-effect waves-dark" href="#" data-bs-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen font-size-24"></i>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-magnify font-size-24"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-menu-end dropdown-lg p-0">
                                <form class="input-group p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary rounded-start-0" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <li class="nav-link waves-effect waves-dark" id="theme-mode">
                            <i class="bx bx-moon font-size-24"></i>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-dark" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{url('assets/images/users/avatar-1.jpg')}}" alt="user-image" class="rounded-circle">
                                <span class="ms-1 d-none d-md-inline-block">
                                    {{Auth::user()->nom}} <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="{{ route('profile.edit') }}" class="dropdown-item notify-item">
                                    <i data-lucide="user" class="font-size-16 me-2"></i>
                                    <span>Mon profile</span>
                                </a>

                                <!-- item-->
                                <a href="{{route('admin.horaires.index')}}" class="dropdown-item notify-item">
                                    <i data-lucide="settings" class="font-size-16 me-2"></i>
                                    <span>parametre des horaire de ventes</span>
                                </a>

                                <!-- item-->
                                <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                                    <i data-lucide="lock" class="font-size-16 me-2"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="{{route('logout')}}" class="dropdown-item notify-item">
                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <i data-lucide="log-out" class="font-size-16 me-2"></i>
                                        <button type="submit" class="btn btn-sm btn-primary">Deconnexion</button>
                                    </form>

                                </a>

                            </div>
                        </li>

                    </ul>
                </div>
            </div>
