<header>
    <nav class="bg-dark navbar navbar-expand-lg bg-body-tertiary navbar_admin-client" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div class="brand-logo-wrapper">
                    <img src="{{ Vite::asset('resources/img/main-logo.jpeg') }}" alt="Logo" class="brand-logo">
                </div>
                <span>Beach Admin Panel</span>
              </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Beaches
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.beaches.index') }}">Lista</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.beaches.create') }}">Create</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex mx-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>
