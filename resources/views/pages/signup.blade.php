@extends("layouts.main")
@section("title", "signup")
@section('content')

<div class="container">
    <div class="signup_section card">
        @if (Session::has('fail')) 
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
         @endif
        <form action="/signup" method="POST">
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
           <div class=" d-flex justify-content-start">
                <div class="mb-3" style="width: 49%">
                <label for="fatherName" class="form-label">Father's name</label>
                <input type="text" class="form-control" id="fatherName" name="fatherName" aria-describedby="emailHelp" placeholder="Enter your father's name" value="{{old('fatherName')}}">
                <span class="text-danger">
                    @error('fatherName')
                        {{$message}}
                    @enderror
               </span>
            </div>
            <div class="mb-3" style="width: 49%; margin-left: 2%">
                <label for="motherName" class="form-label">Mother's name</label>
                <input type="text" class="form-control" id="motherName" name="motherName" aria-describedby="emailHelp" placeholder="Enter your mother's name" value="{{old('motherName')}}">
                <span class="text-danger">
                    @error('motherName')
                        {{$message}}
                    @enderror
               </span>
            </div>
            </div>
            
            <div class="form-floating">
                <select class="form-select" name="class" id="floatingSelect"  aria-label="Floating label select example" >
                    <option value="1" {{old('class') == 1 ? 'selected' : ''}}>One</option>
                    <option value="2" {{old('class') == 2 ? 'selected' : ''}}>Two</option>
                    <option value="3" {{old('class') == 3 ? 'selected' : ''}}>Three</option>
                    <option value="4" {{old('class') == 4 ? 'selected' : ''}}>Four</option>
                    <option value="5" {{old('class') == 5 ? 'selected' : ''}}>Five</option>
                    <option value="6" {{old('class') == 6 ? 'selected' : ''}}>Six</option>
                    <option value="7" {{old('class') ==  7 ? 'selected' : ''}}>Seven</option>
                    <option value="8" {{old('class') == 8 ? 'selected' : ''}}>Eight</option>
                    <option value="9" {{old('class') == 9 ? 'selected' : ''}}>Nine</option>
                    <option value="10" {{old('class') == 10 ? 'selected' : ''}}>Ten</option>
                    <option value="11" {{old('class') == 11 ? 'selected' : ''}}>Eleven</option>
                    <option value="12" {{old('class') == 12 ? 'selected' : ''}}>Twelve</option>
                </select>
                <label for="floatingSelect">Which class do you read in?</label>
                <span class="text-danger">
                    @error('class')
                        {{$message}}
                    @enderror
               </span>
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
        <a href="/admin_signup" class="list-group-item" style="width: 124px; color:cornflowerblue; margin-top: -30px">Sign up as admin</a>
    </div>
</div>
@endsection