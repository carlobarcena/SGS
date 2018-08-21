@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header"><img src="images/home.png" width="70"> Home</h1>
        </div>
        <!--End Page Header -->
    
    <div class="row container-fluid">
        
        <div class="col-lg-12">
            <div class="alert alert-info">
                Hello! Welcome Back! <strong>{{$firstname}}</strong> ({{$role}})
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
                    Username: {{$username}} <br>
                    Firstname: {{$firstname}} <br>
                    Lastname: {{$lastname}} <br>
                    @if($role == 'student')
                    <a href="{{route('student_grade')}}">Check my grades</a>
                    @endif
                    @if($role == 'teacher')
                    <a href="{{route('gradeStudent')}}">Grade my students</a>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>

@extends('modals')
@endsection
