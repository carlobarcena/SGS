<!-- teacherlist.blade.php -->
@extends('layouts.app')
@section('content')

<div class="container-fluid white">
<div class="row container-fluid">
	<!-- Page Header -->
  <div class="col-lg-12">
      <h1 class="page-header"><img src="images/teacher.png" width="70"> Teacher List</h1>
  </div>
  <!--End Page Header -->


</div>
<div class="row container-fluid">
<table class="table">
  <thead>
    <tr class="info">
      <th scope="col">#IdCode</th>
      <th scope="col">UserName</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Email</th>
      <th scope="col">Section</th>
      <th scope="col">Subject</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($teacher_list as $teacher)
  	<tr>
  	<td>{{$teacher->teacher_idcode}}</td>
  	<td>{{$teacher->teacher_username}}</td>
  	<td>{{$teacher->firstname}}</td>
  	<td>{{$teacher->lastname}}</td>
  	<td>{{$teacher->email}}</td>
  	<td>{{$teacher->sectionname}}</td>
  	<td>{{$teacher->title}}</td>
  	<td><a onclick="TeacherModal('{{$teacher->teacher_username}}','{{$teacher->firstname}}','{{$teacher->lastname}}','{{$teacher->sectionname}}','{{$teacher->title}}')" data-toggle="modal" data-target="#editTeacherModal"><i class="far fa-edit"></i></a>   <a onclick="deleteTeacherUser('{{$teacher->teacher_username}}','{{$teacher->firstname}}','{{$teacher->lastname}}')" data-toggle="modal" data-target="#deleteTeacherModal" style="color: darkred"><i class="fas fa-trash-alt"></i></a></td></td>
  	</tr>
	@endforeach
    
  </tbody>
</table>
</div>
</div>
<div class="modal fade" id="editTeacherModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="modal-content-hello">
    
    </div>
  </div>
</div>
@extends('modals')
@extends('deleteteachermodal')
@endsection