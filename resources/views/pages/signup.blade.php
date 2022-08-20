@extends("layouts.main")
@section("title", "signup")
@section('content')

<div class="container">
    <div class="signup_section card">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="fname" class="form-label">First name</label>
                <input type="text" class="form-control" id="fname" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lname" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="signup_email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="esignup_email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="sign_pwd" class="form-label">Password</label>
                <input type="password" class="form-control" id="sign_pwd">
            </div>
            <button type="submit" class="btn btn-warning">Sign up</button>
        </form>
    </div>
</div>
@endsection