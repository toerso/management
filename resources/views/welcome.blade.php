@extends("layouts.main")
@section("title", "Welcome")
@section('content')

<div class="container">
    <div class="login_group btn-group" role="group" aria-label="Basic mixed styles example">
        <a href="/admin_login" class="btn btn-danger">Admin login</a>

        <a href="/student_login" class="btn btn-success">Student login</a>
    </div>
</div>
@endsection