<strong>{{$subject->subject->title}}</strong><br>

@foreach($subject->subject->marks as $mark)
	{{$mark->student->group->sectionname}} {{$mark->student->lastname}}, {{$mark->student->firstname}} {{$mark->mark1}} {{$mark->mark2}} {{$mark->mark3}} {{$mark->mark4}} <br>
@endforeach