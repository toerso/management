@extends("layouts.main")
@section("title",  $title)
@section('content')

<div class="container">
    <div class="login_section card">
        @if (Session::has('fail')) 
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
         @endif
        <form action="{{route($routeName)}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="login_email" aria-describedby="emailHelp" placeholder="Enter your email" name="email" value="{{old('email')}}"/>
                <span class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="login_pwd" placeholder="Enter your password" name="password">
                <span class="text-danger">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <button type="submit" class="btn btn-warning float-end mt-5" style="width: 80px;">Login</button>
        </form>
    </div>
</div>
@endsection