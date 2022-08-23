@extends("layouts.main")
@section("title", "admin signup")
@section('content')

<div class="container">
    <div class="signup_section card">
        <form action="/admin_signup" method="POST">
            @csrf
            <div class="d-flex justify-content-start">
                <div class="mb-3 " style="width: 49%">
                <label for="fname" class="form-label">First name</label>
                <input type="text" class="form-control" id="fname" name="firstName" aria-describedby="emailHelp" placeholder="Enter your first name" value="{{old('firstName')}}">
               <span class="text-danger">
                    @error('firstName')
                        {{$message}}
                    @enderror
               </span>
            </div>
            <div class="mb-3" style="width: 49%; margin-left: 2%">
                <label for="lname" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lname" name="lastName" aria-describedby="emailHelp" placeholder="Enter your last name" value="{{old('lastName')}}">
                <span class="text-danger">
                    @error('lastName')
                        {{$message}}
                    @enderror
               </span>
            </div>
            </div>
           
            <div class="mb-3 mt-3">
                <label for="signup_email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="esignup_email" name="email" aria-describedby="emailHelp" placeholder="Enter your email" value="{{old('email')}}">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                <span class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
               </span>
            </div>

            <div class="d-flex justify-content-start">
                <div class="mb-3" style="width: 49%">
                    <label for="sign_pwd" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="sign_pwd" placeholder="Enter your password">
                    <span class="text-danger">
                        @error('password')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="mb-3"  style="width: 49%; margin-left: 2%">
                    <label for="sign_con_pwd" class="form-label" >Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword" id="sign_con_pwd" placeholder="Enter again same password">
                    <span class="text-danger">
                        @error('confirmPassword')
                            {{$message}}
                        @enderror
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-warning float-end mt-5">Sign up</button>
        </form>
        <a href="/signup" class="list-group-item" style="width: 134px; color:cornflowerblue; margin-top: -30px">Sign up as student</a>
    </div>
</div>
@endsection