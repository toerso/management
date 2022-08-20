@extends("layouts.main")
@section("title", "admin login")
@section('content')

<div class="container">
    <div class="login_section card">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="login_email" aria-describedby="emailHelp" placeholder="Enter your email"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="login_pwd" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-warning" style="width: 80px;">Login</button>
        </form>
    </div>
</div>
@endsection