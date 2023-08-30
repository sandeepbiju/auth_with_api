<div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info d-flex">
                    <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    <div class="ml-5">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-arrow-right"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item ">
                        <a href="{{ route('home') }}" class="nav-link @if (request()->is('home')) active @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/company') }}"
                            class="nav-link @if (request()->is('company*')) active @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Companies
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/employee') }}"
                            class="nav-link @if (request()->is('employee*')) active @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Employees
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

</div>
