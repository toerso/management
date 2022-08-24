@extends("layouts.main")
@section("title", "Admin dashboard")
@section('content')

<div class="container">
    <div class="sec-1x">
        <div class="sec-inner-1x">
            <div class="card card-body" style="width: 15rem; height:15rem; border-radius: 50%; padding:0">
                <img src="{{asset('assets/images/user2.png')}}" alt="User image." style="width: 15rem; height:15rem; border-radius: 50%">
            </div>
            @if (Session::has('user')) 
                <a class="card" href="{{route('admin_profile')}}" style="padding: 7px; margin-top: 10px; font-size: 1.3rem; text-align:center; text-decoration: none; color:grey">{{Session::get('user')}}</a>
            @endif
        </div>

        <div class="sec-inner-2x">
            @if (isset($adminProfile))
                <a class="card student-list" href="{{route('admin_dash')}}"><i class="fa-solid fa-list"></i></a>
                 @if (Session::has('fail')) 
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @if (Session::has('success')) 
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                
                <form action="{{route('admin_profile_update')}}" method="POST">
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
                    <a href="{{route('admin_profile_update')}}" class="btn btn-primary mb-3"  style="float: right"><i class="fas fa-edit"></i> Edit</a>
                @endif
            @else
                <h2 class="mb-3">Student lists: </h2>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Roll</th>
                        <th scope="col">Name</th>
                        <th scope="col">Father's name</th>
                        <th scope="col">Mother's name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Class</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <th scope="row">{{$student->id}}</th>
                                <td>{{$student->first_name." ".$student->last_name}}</td>
                                <td>{{$student->father_name}}</td>
                                <td>{{$student->mother_name}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->class}}</td>
                                <td>
                                    <a href="{{route('admin_stu_del', $student->id)}}" class="btn btn-danger"><i class="fa-solid fa-circle-xmark"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
            @endif
    </div>
</div>
</div>
@endsection