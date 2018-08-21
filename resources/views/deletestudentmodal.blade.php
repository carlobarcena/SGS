<!-- deletestudentmodal.blade.php -->
<div class="modal fade" id="deleteStudentModal" 
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
        id="favoritesModalLabel">Are you sure?</h4>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{route('deleteStudent')}}">
      {{csrf_field()}}
      	<input class="datainput" name="studentuser" type="text" hidden>
        <p>
        You are about to delete this student: <span id="name12"></span> <span id="name2"></span>.<br>
        Click Confirm Button to proceed.
        </p>
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
        </form>
      </div>
    </div>
  </div>
</div>