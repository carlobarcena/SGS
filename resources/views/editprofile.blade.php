<!-- editprofile.blade.php -->
@extends('layouts.app')

@section('content')
@guest
<h1><center>You are not allowed!<center></h1>
@else
<div class="container-fluid">
    <!-- Page Header -->
<div class="col-lg-12">
    <h1 class="page-header"><img src="images/editprofile.png" width="70"> Edit Profile</h1>
</div>
<!--End Page Header -->
    <div class="row container-fluid">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Your Profile</div>

                <div class="panel-body">
                    <form id="editProfile-post" class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{$username}}" disabled required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                                    <label for="role" class="col-md-4 control-label">Role</label>
                                    <div class="col-md-6">
                                        <label>
                                            <select name="role" class="form-control"
                                                    value="{{ old('role') }}" required>
                                                <option value="{{$role}}" selected disabled>{{ucfirst($role)}}</option>
                                               
                                            </select>
                                        </label>
                                    </div>
                        </div>
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">Firstname</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{$firstname}}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Lastname</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{$lastname}}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$email}}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="button" class="btn btn-primary" value="Confirm" data-toggle="modal" data-target="#editProfileModal">
                                <small><a href="{{route('changepassword')}}">Change Password</a></small>
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@extends('modals')
@endguest
@endsection