<!-- gradeStudent.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container-fluid white">

<!-- ============================================================ -->
<ul class="nav nav-tabs">

  @if($span == 0)
  <li id="talist0" class="active"><a data-toggle="tab" href="#menu0">All</a></li>
  @else
  <li id="talist0"><a data-toggle="tab" href="#menu0">All</a></li>
  @endif
  @foreach($section as $sections)
  @if($sections->id == $span)
  <li id="talist{{$sections->id}}" class="active"><a data-toggle="tab" href="#menu{{$sections->id}}">{{$sections->sectionname}}</a></li>
  @else
  <li id="talist{{$sections->id}}"><a data-toggle="tab" href="#menu{{$sections->id}}">{{$sections->sectionname}}</a></li>
  @endif
  @endforeach
  <li><a data-toggle="tab" href="#average">Averages</a></li>
</ul>


<!-- ============================================================== -->

<div class="tab-content">

@for ($i = 0; $i <= sizeof($section); $i++)
@if( $i == $span )
<div id="menu{{$i}}" class="tab-pane fade in active">
@else
<div id="menu{{$i}}" class="tab-pane fade in">
@endif
  <div class="row container-fluid">
    <div class="col-lg-6">
    <h1>My Students     
    ( {{$test->title}} )    
    
    </h1>

    </div>

  </div>
  <div class="row container-fluid">
  <table id="example{{$i}}" class="table display" style="width:100%">
    <thead>
      <tr>
        <th scope="col">Student Username</th>
        <th scope="col">Student Name</th>
        <th scope="col">Section</th>
        <th scope="col">1st Quarter</th>
        <th scope="col">2nd Quarter</th>
        <th scope="col">3rd Quarter</th>
        <th scope="col">4th Quarter</th>
        <th scope="col">Average</th>
        <th scope="col">Edit</th>
      </tr>
    </thead>
    <tbody>

      @php
      for($j=0;$j<=$i;$j++)
      {
      if($i==$j){
        $list = $looplist[$i];
      }
      }
    
      @endphp
      @foreach ($list as $subject)
      <tr>
      <td>{{$subject->student_username}}</td>
      <td>{{$subject->firstname}} {{$subject->lastname}}</td>
      <td>{{$subject->sectionname}}</td>
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
      
      <td><a onclick="gradeModal('{{$subject->student_username}}','{{$subject->firstname}}','{{$subject->lastname}}','{{$subject->mark1}}','{{$subject->mark2}}','{{$subject->mark3}}','{{$subject->mark4}}','{{$subject->mark_id}}')" data-toggle="modal" data-target="#editStudentGradeModal"><i class="far fa-edit"></i></a></td>
      </tr>
    @endforeach
     
    </tbody>
  </table>
  </div>
</div>
@endfor
<div id="average" class="tab-pane fade in">
<h3>Class Average 
    ({{$test->title}})
</h3>
<div class="row container-fluid">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Section</th>
        <th scope="col">1st</th>
        <th scope="col">2nd</th>
        <th scope="col">3rd</th>
        <th scope="col">4th</th>
        <th scope="col">Total Average</th>
      </tr>
    </thead>
    <tbody>
      
      @for ($a = 0; $a < sizeof($section); $a++)
      <tr>
      <td>{{$section[$a]->sectionname}}</td>
      @for ($b = 1; $b <= 4; $b++)
      <td>{{round($marklist[$b][$a+1],2)}}</td>
      @endfor
      @php
      $sectave =($marklist[1][$a+1] + $marklist[2][$a+1] + $marklist[3][$a+1] +$marklist[4][$a+1])/4;

      echo '<td>'. round($sectave,2) . '</td>';
      @endphp
      @endfor
      
      
      </tr>

      <tr>
      <td>All Sections</td>
      @foreach($trueave as $average)
      <td>{{round($average,2)}}</td>
      @endforeach
      <td>
      @php
        $overall = ($trueave[0] + $trueave[1] + $trueave[2] + $trueave[3])/4;
        if($overall>=70){
        echo round($overall,2);
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

</div>

</div>

<div class="modal fade" id="editStudentGradeModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="favoritesModalLabel">Edit Grade</h4>
      </div>
      <form method="POST" action="{{route('updateGrade')}}">
      <div class="modal-body">
        {{csrf_field()}}
        <input class="test321" type="text" name="spantest" value="" hidden>
        <span id="modal-ajax"></span> 
      </div>
      </form> 
    </div>
  </div>
</div>
@extends('modals')
@extends('partials.table-script')

@endsection

