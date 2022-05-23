@section('admin')
<!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>

        <!-- Nav Item - Users -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-users" aria-hidden="true"></i>
                <span>User</span>
            </a>
            <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/users">User List</a>
                    <a class="collapse-item" href="{{ route('register') }}">Create User</a>
                </div>
            </div>
        </li>
@endsection
