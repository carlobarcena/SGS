<!-- table-script.blade.php -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- DataTable -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>

<script type="text/javascript">
	
$(document).ready(function(){
	// data-table 
    @for ($i = 0; $i <= sizeof($section); $i++)
    $('#example{{$i}}').DataTable();
    @endfor
});

</script>