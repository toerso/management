@extends("layouts.main")
@section("title", "Student dashboard")
@section('content')

<div class="container">
    <div class="sec-1x">
       <div class="sec-inner-1x">
             <div class="card card-body" style="width: 15rem; height:15rem; border-radius: 50%; padding:0">
                 <img src="{{asset('assets/images/user2.png')}}" alt="User image." style="width: 15rem; height:15rem; border-radius: 50%">
            </div>
            @if (Session::has('user')) 
                <div class="card" style="padding: 7px; margin-top: 10px; font-size: 1.3rem; text-align:center">{{Session::get('user')}}</div>
            @endif
       </div>

       <div class="sec-inner-2x">
            @if (Session::has('fail')) 
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @if (Session::has('success')) 
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            <form action="{{route('student_profile_update')}}" method="POST">
                @csrf
                <div class="d-flex justify-content-start">
                    <div class="mb-3 " style="width: 49%">
                    <label for="fname" class="form-label">First name</label>
                    <input type="text" class="form-control" id="fname" name="firstName" aria-describedby="emailHelp" placeholder="Enter your first name" value="{{$user['first_name']}}" {{Session::has('edit')&& Session::get('edit')?'':'disabled'}}>
                     <span class="text-danger">
                    @error('firstName')
                        {{$message}}
                    @enderror
               </span>
                </div>
                <div class="mb-3" style="width: 49%; margin-left: 2%">
                    <label for="lname" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="lname" name="lastName" aria-describedby="emailHelp" placeholder="Enter your last name" value="{{$user['last_name']}}" {{Session::has('edit')&& Session::get('edit')?'':'disabled'}}>
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
                    <input type="text" class="form-control" id="fatherName" name="fatherName" aria-describedby="emailHelp" placeholder="Enter your father's name" value="{{$user['father_name']}}" {{Session::has('edit')&& Session::get('edit')?'':'disabled'}}>
                     <span class="text-danger">
                    @error('fatherName')
                        {{$message}}
                    @enderror
               </span>
                </div>
                <div class="mb-3" style="width: 49%; margin-left: 2%">
                    <label for="motherName" class="form-label">Mother's name</label>
                    <input type="text" class="form-control" id="motherName" name="motherName" aria-describedby="emailHelp" placeholder="Enter your mother's name" value="{{$user['mother_name']}}" {{Session::has('edit')&& Session::get('edit')?'':'disabled'}}>
                     <span class="text-danger">
                    @error('motherName')
                        {{$message}}
                    @enderror
               </span>
                </div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="signup_email" class="form-label">Class</label>
                    <input type="number" class="form-control" id="esignup_email" name="class" placeholder="Which classs do you read in?" value="{{$user['class']}}" {{Session::has('edit')&& Session::get('edit')?'':'disabled'}}>
                     <span class="text-danger">
                    @error('class')
                        {{$message}}
                    @enderror
               </span>
                </div>

                <div class="mb-3 mt-3">
                    <label for="signup_email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="esignup_email" name="email" aria-describedby="emailHelp" placeholder="Enter your email" value="{{$user['email']}}" {{Session::has('edit')&& Session::get('edit')?'':'disabled'}}>
                     <span class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
               </span>
                </div>
                @if (Session::has('edit') && Session::get('edit'))
                    <button type="submit" class="btn btn-warning "  style="float: right">Update</button>
                @endif
            </form>
            @if (Session::has('edit') && Session::get('edit'))
                <a href="{{route('edit_cancel')}}" class="btn btn-danger mb-3"><i class="fas fa-cancel"></i> Cancel</a>
            @else
                <a href="{{route('student_profile_update')}}" class="btn btn-primary mb-3"  style="float: right"><i class="fas fa-edit"></i> Edit</a>
            @endif
       </div>
    </div>
</div>
@endsection