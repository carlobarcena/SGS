<!-- script.blade.php -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- DataTable -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>


<script>
$(document).ready(function(){

  
    $('#preloader').fadeOut(900,function(){$(this).remove();});
  
    
    $('#studentlistdata').DataTable();
     
    @guest
    @else
    @if(Auth::user()->role == 'admin')
     $("#mySidenav").addClass("sidenav-toggle");
    $("#main").addClass("sidenav-main-toggle");  
    @endif
    @endguest  
     @if(session('profilechange')==1)
        $("#editProfileSuccessModal").modal('show');
        {{session(['profilechange' => 0])}};
     @endif

     @if(session('sucpascha')==1)
        $("#sucpaschaModal").modal('show');
        {{session(['sucpascha' => 0])}};
     @endif

     @if(session('faipascha')==1)
        $("#faipaschaModal").modal('show');
        {{session(['faipascha' => 0])}};
     @endif

     @if(session('usesucreg')==1)
        $("#usesucregModal").modal('show');
        {{session(['usesucreg' => 0])}};
     @endif

     @if(session('student_delete')==1)
        $("#student_delete").modal('show');
        {{session(['student_delete' => 0])}};
     @endif

     @if(session('teacher_delete')==1)
        $("#teacher_delete").modal('show');
        {{session(['teacher_delete' => 0])}};
     @endif

     @if(session('error_grade')==1)
        $("#error_grade").modal('show');
        {{session(['error_grade' => 0])}};
     @endif

     @if(session('success')==1)
        $("#action_success").modal('show');
        {{session(['success' => 0])}};
     @endif

    $("#burger-toggle").click(function(){
        $("#mySidenav").addClass("sidenav-toggle");
        $("#main").addClass("sidenav-main-toggle");
    });

    $('#editProfile-submit').click(function(){
        $('#editProfile-post').submit();
    });

    $('#changePassword-submit').click(function(){
        $('#changePassword-post').submit();
    });

    
    
});

    function gradeModal(username,firstname,lastname,mark1,mark2,mark3,mark4,id){
        
        // ====For tabs====
        $tablists = $(".nav-tabs").children();
        $activeElementIndex=0;
        for($i=0;$i<=$tablists.length;$i++){
           if($tablists.eq($i).hasClass( "active" )){
                $activeElementIndex = $i;
                console.log("Active Element index is: " + $activeElementIndex);   
           }
        }
        $('.test321').val($activeElementIndex);
        // ====END For tabs==== 

        $.post("/grademodal", {
        username:username,
        firstname:firstname,
        lastname:lastname,
        mark1:mark1,
        mark2:mark2,
        mark3:mark3,
        mark4:mark4,
        id:id,
        _token: $('meta[name="csrf-token"]').attr('content')},
        function(data,status){
            $('#modal-ajax').html(data)
        
    });
    } 


var noc =0;
function openNav() {
	
    if(noc==0){
    // document.getElementById("mySidenav").style.width = "200px";
    $("#mySidenav").css("width","200px");
    document.getElementById("main").style.marginLeft = "200px";
    noc= 1;
	}
	else{
	document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    noc = 0;
	}
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}

// ajax
function deleteStudentUser(username,firstname,lastname) {
    console.log("User ID clicked is: " + username);
    
    $.post("/deletestudentmodal", {
        username:username,
        firstname:firstname,
        lastname:lastname,
        _token: $('meta[name="csrf-token"]').attr('content')},
        function(data,status){
            data = JSON.parse(data);
        console.log(data);
        $('#deleteStudentModal .modal-dialog .modal-content .modal-body .datainput').val(data[0]);
        $('#name12').html(data[1]);
        $('#name2').html(data[2]);
    });
    }

function deleteTeacherUser(username,firstname,lastname) {
    console.log("User ID clicked is: " + username);
    
    $.post("/deleteteachermodal", {
        username:username,
        firstname:firstname,
        lastname:lastname,
        _token: $('meta[name="csrf-token"]').attr('content')},
        function(data,status){
            data = JSON.parse(data);
        console.log(data);
        $('#deleteTeacherModal .modal-dialog .modal-content .modal-body .datainput').val(data[0]);
        $('#name1').html(data[1]);
        $('#name2').html(data[2]);
    });
    }

function TeacherModal(username,firstname,lastname,section,subject) {
    console.log("User ID clicked is: " + username);
    
    $.post("/teachermodal", {
        username:username,
        firstname:firstname,
        lastname:lastname,
        section:section,
        subject:subject,
        _token: $('meta[name="csrf-token"]').attr('content')},
        function(data,status){
            $('#modal-content-hello').html(data)
        
    });
    }

function StudentModal(username,firstname,lastname,section) {
    console.log("User ID clicked is: " + username);
    
    $.post("/studentmodal", {
        username:username,
        firstname:firstname,
        lastname:lastname,
        section:section,
        _token: $('meta[name="csrf-token"]').attr('content')},
        function(data,status){
            $('#modal-ajax').html(data)
        
    });
    }

function SubjectModal(id,title) {
    
    
    $.post("/subjectmodal", {
        id:id,
        title:title,
        _token: $('meta[name="csrf-token"]').attr('content')},
        function(data,status){
            $('#modal-ajax').html(data)
        
    });
    }

function deleteSubject(id,title) {
 
    
    $.post("/deletesubjectModal", {
        id:id,
        title:title,
        _token: $('meta[name="csrf-token"]').attr('content')},
        function(data,status){
        data = JSON.parse(data);
        console.log(data);
        $('#deleteSubjectModal .modal-dialog .modal-content .modal-body .datainput').val(data[0]);
        $('#name1').html(data[1]);
    });
    }

function SectionModal(id,section) {
    
    
    $.post("/sectionmodal", {
        id:id,
        section:section,
        _token: $('meta[name="csrf-token"]').attr('content')},
        function(data,status){
            $('#modal-ajax').html(data)
        
    });
    }

function deleteSection(id,section) {
 
    
    $.post("/deletesectionModal", {
        id:id,
        section:section,
        _token: $('meta[name="csrf-token"]').attr('content')},
        function(data,status){
        data = JSON.parse(data);
        console.log(data);
        $('#deleteSectionModal .modal-dialog .modal-content .modal-body .datainput').val(data[0]);
        $('#sectionname1').html(data[1]);
    });
    }




</script>



