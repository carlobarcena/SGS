<!-- createsection.blade.php -->
@extends('layouts.app')

@section('content')
@guest
<h1><center>You are not allowed!<center></h1>
@else
@if(Auth::user()->role == 'admin')
<div class="container-fluid white">
<!-- Page Header -->
<div class="col-lg-12">
    <h1 class="page-header"><img src="images/section.png" width="70"> Sections</h1>
</div>
<!--End Page Header -->
<div class="container-fluid">
    <div class="row container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Create Section</div>
                  <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="sectionname" class="col-md-4 control-label">Section Name</label>

                            <div class="col-md-6">
                                <input id="sectionname" type="text" class="form-control" name="sectionname" value="" required autofocus>

                                @if ($errors->has('sectionname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sectionname') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 pad-top-2">
                                <button type="submit" class="btn btn-primary">
                                    Create Section
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
                <div class="panel-heading">Section List</div>
  <div class="panel-body">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#SectionID</th>
      <th scope="col">Section Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($section_list as $section)
      <tr>
      <td>{{$section->id}}</td>
      <td>{{$section->sectionname}}</td>
      <td><a onclick="SectionModal('{{$section->id}}','{{$section->sectionname}}')" data-toggle="modal" data-target="#editSectionModal"><i class="far fa-edit"></i>   <a onclick="deleteSection('{{$section->id}}','{{$section->sectionname}}')" data-toggle="modal" data-target="#deleteSectionModal" style="color: darkred"><i class="fas fa-trash-alt"></i></a></td>
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
<div class="modal fade" id="editSectionModal" 
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