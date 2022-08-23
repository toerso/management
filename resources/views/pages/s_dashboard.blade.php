@extends("layouts.main")
@section("title", "Student dashboard")
@section('content')

<div class="container">
    {{-- @if (Session::has('success')) 
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif --}}
    <div class="card card-body" style="width: 18rem; height:18rem; border-radius: 50%">
         <img class="card" src="..." alt="Card image cap" style="border-radius: 50%">
    </div>

    @if (Session::has('user')) 
        <div class="card">{{Session::get('user')}}</div>
    @endif
    
</div>
@endsection