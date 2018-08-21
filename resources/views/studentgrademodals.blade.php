<!-- studentgrademodals.blade.php -->
      
      	{{$username}}
      	<br>
      	<input type="text" name="studentuser" value="{{$mark_id}}" hidden>
      	1st Quarter:  <input type="number" name="mark1" value="{{$mark1}}" style="margin-left: 7.5px"><br>
      	2nd Quarter:  <input type="number" name="mark2" value="{{$mark2}}" style="margin-left: 1.5px"><br>
      	3rd Quarter:  <input type="number" name="mark3" value="{{$mark3}}" style="margin-left: 5px"><br>
      	4th Quarter:  <input type="number" name="mark4" value="{{$mark4}}" style="margin-left: 5px"><br>
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
      
