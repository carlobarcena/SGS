<!-- sectionmodal.blade.php -->

<div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="favoritesModalLabel">Edit Section Name</h4>
      </div>
      <form method="POST" action="{{route('editSection')}}">
      <div class="modal-body">
        {{csrf_field()}}
        <input name="input1" type="number" value="{{$id}}" hidden>
        Section Name: <input name="input2" type="text" value="{{$section}}">

        <p>
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
      </div>
      </form>