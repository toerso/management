@extends("layouts.main")
@section("title", "signup")
@section('content')

<div class="container">
    <div class="signup_section card">
        <form action="/signup" method="POST">
            @csrf
            <div class="mb-3">
                <label for="fname" class="form-label">First name</label>
                <input type="text" class="form-control" id="fname" name="firstName" aria-describedby="emailHelp" placeholder="Enter your first name" value="{{old('firstName')}}">
               <span class="text-danger">
                    @error('firstName')
                        {{$message}}
                    @enderror
               </span>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lname" name="lastName" aria-describedby="emailHelp" placeholder="Enter your last name" value="{{old('lastName')}}">
                <span class="text-danger">
                    @error('lastName')
                        {{$message}}
                    @enderror
               </span>
            </div>
            <div class="mb-3">
                <label for="fatherName" class="form-label">Father's name</label>
                <input type="text" class="form-control" id="fatherName" name="fatherName" aria-describedby="emailHelp" placeholder="Enter your father's name" value="{{old('fatherName')}}">
                <span class="text-danger">
                    @error('fatherName')
                        {{$message}}
                    @enderror
               </span>
            </div>
            <div class="mb-3">
                <label for="motherName" class="form-label">Mother's name</label>
                <input type="text" class="form-control" id="motherName" name="motherName" aria-describedby="emailHelp" placeholder="Enter your mother's name" value="{{old('motherName')}}">
                <span class="text-danger">
                    @error('motherName')
                        {{$message}}
                    @enderror
               </span>
            </div>
            <div class="form-floating">
                <select class="form-select" name="class" id="floatingSelect"  aria-label="Floating label select example">
                    <option value="1" selected>One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                    <option value="5">Five</option>
                    <option value="6">Six</option>
                    <option value="7">Seven</option>
                    <option value="8">Eight</option>
                    <option value="9">Nine</option>
                    <option value="10">Ten</option>
                    <option value="11">Eleven</option>
                    <option value="12">Twelve</option>
                </select>
                <label for="floatingSelect">Which class do you read in?</label>
                <span class="text-danger">
                    @error('class')
                        {{$message}}
                    @enderror
               </span>
            </div>
            <div class="mb-3">
                <label for="signup_email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="esignup_email" name="email" aria-describedby="emailHelp" placeholder="Enter your email" value="{{old('email')}}">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                <span class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
               </span>
            </div>
            <div class="mb-3">
                <label for="sign_pwd" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="sign_pwd">
                <span class="text-danger">
                    @error('password')
                        {{$message}}
                    @enderror
               </span>
            </div>
            <button type="submit" class="btn btn-warning float-end">Sign up</button>
        </form>
    </div>
</div>
@endsection