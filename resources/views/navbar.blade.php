<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid float-right">
        <a class="navbar-brand" href="{{route('welcome')}}">Xs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    @if (Session::has('status'))
                        <a class="nav-link text-dark" href="/signout">Sign out</a>
                    @else
                        <a class="nav-link text-dark" href="{{route('student_signup')}}">Sign up</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>