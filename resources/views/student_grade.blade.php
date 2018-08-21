<!-- student_grade.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container-fluid white">
<div class="row container-fluid">
	<div class="col-lg-6">
	<h1>My Grades</h1>

	</div>

	<!-- <div class="col-lg-6 pad-top-2">
		<form method="POST">
		{{csrf_field()}}
		<div class="form-group">
		<div class="col-lg-3">
		    <div class="input-group">
		      <input id="teacherid" name="teacherid" type="text" class="form-control" placeholder="Username">
		    </div>
	    </div>
	    
	    <div class="col-lg-3">
		    <span class="input-group-btn">
		        <button class="btn btn-primary" type="submit">Search</button>
		      </span>
	    </div>
	    </div>
	    </form>
    </div> -->
</div>
<div class="row container-fluid">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Subject Name</th>
      <th scope="col">1st Quarter</th>
      <th scope="col">2nd Quarter</th>
      <th scope="col">3rd Quarter</th>
      <th scope="col">4th Quarter</th>
      <th scope="col">Average Overall</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($subject_list as $subject)
  	<tr>
  	<td>{{$subject->title}}</td>
  	<td>
  	@if($subject->mark1 > 0)
  	{{$subject->mark1}}
  	@else
  	N/A
  	@endif
  	</td>
  	<td>
  	@if($subject->mark2 > 0)
  	{{$subject->mark2}}
  	@else
  	N/A
  	@endif
  	</td>
  	<td>
  	@if($subject->mark3 > 0)
  	{{$subject->mark3}}
  	@else
  	N/A
  	@endif
  	</td>
  	<td>
  	@if($subject->mark4 > 0)
  	{{$subject->mark4}}
  	@else
  	N/A
  	@endif
  	</td>
  	<td>
    @php
    $x1 = $subject->mark1;
    $x2 = $subject->mark2;
    $x3 = $subject->mark3;
    $x4 = $subject->mark4;
    $average = ($x1 + $x2 + $x3 + $x4)/4;
    if($x1>0&&$x2>0&&$x3>0&&$x4>0)
    {
    echo $average;
    }
    else
    {
    echo "N/A";
    } 
    @endphp
    </td>
  	</tr>
	 @endforeach
    <tr>
    <td>Average per Quarter</td>
    @foreach ($trueave as $average)
    @if($average>=70)
    <td>{{$average}}</td>
    @else
    <td>N/A</td>
    @endif
    @endforeach
    <td>
      @php
        $overall = ($trueave[0] + $trueave[1] + $trueave[2] + $trueave[3])/4;
        if($overall>=70){
        echo $overall;
        }
        else{
        echo "N/A";
        }
      @endphp
    </td>
    </tr>
  </tbody>
</table>
</div>
</div>
@extends('modals')
@endsection