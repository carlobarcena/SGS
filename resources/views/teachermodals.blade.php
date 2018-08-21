<!-- teachermodals.blade.php -->
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="favoritesModalLabel">Edit Section/Subject</h4>
      </div>
      <form method="GET" action="{{route('updateSection-teach')}}">
      <div class="modal-body">
      
      	Username: <span id="teach1"></span>{{$username}}<br>
        Name: <span id="teach2"></span>{{$firstname}} <span id="teach3"></span>{{$lastname}}
      	<input type="text" name="teacheruser" value="{{$username}}" hidden>
      	<br> Section: 
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
        <br> Subject: 
        <select name="selectsubject">
        @foreach ($subject_list as $subject_here)
        	@if($subject == $subject_here->title)
        	<option value="{{$subject_here->id}}" selected>
        		{{$subject_here->title}}
        	</option>
        	@else
        	<option value="{{$subject_here->id}}">
        		{{$subject_here->title}}
        	</option>
        	@endif
        @endforeach
        </select>
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


