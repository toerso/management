<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Xs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    @if (Session::has('status') && Session::get('status') === "active")
                        <a class="nav-link" href="/student">{{Session::get('user')}}</a>
                    @else
                        <a class="nav-link" href="/signup">Sign up</a>
                    @endif

                    @if (Session::has('status') && Session::get('status') === "active")
                            <a class="nav-link" href="/signout">Sign out</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>