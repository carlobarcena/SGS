<!-- createsubject.blade.php -->
@extends('layouts.app')

@section('content')
@guest
<h1><center>You are not allowed!<center></h1>
@else
@if(Auth::user()->role == 'admin')
<div class="container-fluid white">
<!-- Page Header -->
<div class="col-lg-12">
    <h1 class="page-header"><img src="images/subject.png" width="70"> Subjects</h1>
</div>
<!--End Page Header -->
<div class="container-fluid">
    <div class="row container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Create Subject</div>
                  <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="subjectname" class="col-md-4 control-label">SubjectName</label>

                            <div class="col-md-6">
                                <input id="subjectname" type="text" class="form-control" name="subjectname" value="" required autofocus>

                                @if ($errors->has('subjectname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subjectname') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 pad-top-2">
                                <button type="submit" class="btn btn-primary">
                                    Create Subject
                                </button>
                            </div>
                        </div>
                        </div>
                        </form>
                        </div>
                  </div>
            </div>
        </div>
    </div>


<div class="container-fluid">
    <div class="row container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">Subject List</div>
  <div class="panel-body">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#SubjectID</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($subject_list as $subject)
      <tr>
      <td>{{$subject->id}}</td>
      <td>{{$subject->title}}</td>
      <td><a onclick="SubjectModal('{{$subject->id}}','{{$subject->title}}')" data-toggle="modal" data-target="#editSubjectModal"><i class="far fa-edit"></i>   <a onclick="deleteSubject('{{$subject->id}}','{{$subject->title}}')" data-toggle="modal" data-target="#deleteSubjectModal" style="color: darkred"><i class="fas fa-trash-alt"></i></a></td>
      </tr>
      @endforeach
   
  </tbody>
  </table>
                  </div>
            </div>
        </div>
    </div>
</div>
</div><!--  end of container fluid -->
<div class="modal fade" id="editSubjectModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="modal-ajax">
    </div>
  </div>
</div>
@extends('modals')
@else
<h1><center>Not a valid user!</center></h1>
@endif
@endguest
@endsection