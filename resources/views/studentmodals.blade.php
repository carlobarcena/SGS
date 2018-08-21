<!-- studentmodals.blade.php -->
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="favoritesModalLabel">Edit Section</h4>
      </div>
      <form method="GET" action="{{route('updateSection-stu')}}">
      <div class="modal-body">
      
      	Username: {{$username}}<br>
        Name: {{$firstname}} {{$lastname}}<br>
        Section: 
      	<input type="text" name="studentuser" value="{{$username}}" hidden>
      	<select name="selectsection">
          @foreach ($section_list as $section)
          @if($section_there == $section->sectionname)
          	<option value="{{$section->id}}" selected>
          		{{$section->sectionname}}
          	</option>
          @else
            <option value="{{$section->id}}">
              {{$section->sectionname}}
            </option>
          @endif
          @endforeach
        </select>
        <br>
        Subjects:
        @foreach($subject_list as $stu_subj)
        <br>{{$stu_subj->title}}
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">Close</button>
        <span class="pull-right">
          <button type="submit" class="btn btn-primary">
            Confirm
          </button>
        </span>
        
      </div>
      </form>
   
