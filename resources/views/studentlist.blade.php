<!-- studentlist.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container-fluid white">
<!-- Page Header -->
<div class="col-lg-12">
    <h1 class="page-header"><img src="images/classmates.png" width="70"> Student List</h1>
</div>
<!--End Page Header -->
<div class="row container-fluid">
		
</div>
<div class="row container-fluid">
<table id="studentlistdata" class="table display" style="width:100%">
  <thead>
    <tr class="info">
      <th scope="col">#IdCode</th>
      <th scope="col">UserName</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Section</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($student_list as $student)
  	<tr>
  	<td>{{$student->student_idcode}}</td>
  	<td>{{$student->student_username}}</td>
  	<td>{{$student->firstname}}</td>
  	<td>{{$student->lastname}}</td>
  	<td>{{$student->sectionname}}</td>
  	<td>{{$student->email}}</td>
  	<td><a onclick="StudentModal('{{$student->student_username}}','{{$student->firstname}}','{{$student->lastname}}','{{$student->sectionname}}')" data-toggle="modal" data-target="#editStudentModal"><i class="far fa-edit"></i>   <a onclick="deleteStudentUser('{{$student->student_username}}','{{$student->firstname}}','{{$student->lastname}}')" data-toggle="modal" data-target="#deleteStudentModal" style="color: darkred"><i class="fas fa-trash-alt"></i></a></td>
  	</tr>
	@endforeach
    
  </tbody>
</table>
</div>
</div>

<div class="modal fade" id="editStudentModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="modal-ajax">
    
    </div>
  </div>
</div>
@extends('deletestudentmodal')
@extends('modals')
@endsection