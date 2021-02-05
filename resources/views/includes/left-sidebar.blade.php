<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Teachers <span class="badge badge-success">6</span></a>
                        <div id="submenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('teachers.create') }}">Add Teacher</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('teachers.all') }}">Teachers List</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('students.index') }}" ><i class="fa fa-fw fa-user-circle"></i>Students <span class="badge badge-success">6</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('sessions.index') }}" ><i class="fa fa-fw fa-clock"></i>Sessions <span class="badge badge-success">6</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#subjects-menu" aria-controls="submenu-1"><i class="fa fa-fw fa-book"></i>Subjects <span class="badge badge-success">6</span></a>
                        <div id="subjects-menu" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('subjects.index') }}">Subjects List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('courses.offered') }}">Courses Offered</a>
                                </li>


                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#enrollments-menu" aria-controls="enrollments-menu"><i class="fa fa-fw fa-rocket"></i>Enrollments <span class="badge badge-success">6</span></a>
                        <div id="enrollments-menu" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('pending.list') }}">Pending List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('approved.list') }}">Approved List</a>
                                </li>


                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('settings.index') }}" ><i class="fa fa-fw fa-cog"></i>Settings <span class="badge badge-success">6</span></a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>