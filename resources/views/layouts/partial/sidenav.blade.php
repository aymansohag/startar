        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a href="{{ route('dashboard') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-networking"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-networking"></i>
                            <span class="nav-text">Permission</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('permission.create') }}">Add New</a></li>
                            <li><a href="{{ route('permission.index') }}">Manage Permission</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-networking"></i>
                            <span class="nav-text">Role</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('role.create') }}">Add New</a></li>
                            <li><a href="{{ route('role.index') }}">Manage Role</a></li>
                        </ul>
                    </li>
                </ul>
            
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->