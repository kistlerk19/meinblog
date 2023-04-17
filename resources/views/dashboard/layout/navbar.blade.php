<div class="row g-0">
    <div class="col-12 p-2 ps-4 pe-4 m-0">
        <nav class="navbar navbar-expand-lg nabar-light mt-2 mb-2 p-0">
            <div class="container-fluid p-0">
                <a href="/" class="navbar-brand"><b>Ma Blog</b></a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Images</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/dashboard/users') }}" class="nav-link">Users</a>
                    </li>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-center text-dark" onclick="event.preventDefault()" id="logoutButton">Log Out</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        </nav>
    </div>
    <div class="clo-12 text-center g-0 border-bottom-black border-top-black background-white">
        <img style="max-height: 420px" src="{{ asset('/laravel-blog-bg.png') }}" alt=""
            title="Background Image of Mein Blog">
    </div>
</div>