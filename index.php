<?php
// Include and initialize DB class
require_once 'DB.class.php';
$db = new DB();

// Fetch the users data
$users = $db->getRows('users');
//echo "<pre>";print_r($users);echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>AchieversIT Lead Track</title>	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
     <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="" />
    <title>AchieversIT Traninig Insititute- Enroll Today</title>
    <meta name="description" content="" />
    <meta name="keywords" content="9Golbes Technologies" />
    <link rel="canonical" href="#" />
    <!-- Open Graph Start Code -->
       <link rel="icon" href="https://www.achieversit.com/assets/images/AIT-white.jpg" sizes="32x32" />
    <!--    CSS-->
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
   
    <style>
    .form-group{
            display: inline-block;
            flex-wrap: wrap;
             width: 48%;
    }
    </style>

</head>
<body>
<header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-12">
                    <a href="#" class="Globeslogo"><img src="https://www.achieversit.com/assets/images/AIT-white.jpg" alt="AchieversIT-logo"
                            title="AchieversIT Training Institute" /></a>
                        
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""></span> <span class=""></span> <span class=""></span>
                    </button>
                </div>
                <div class="col-lg-4  text-center col-sm-12"> 
                    <h1 class="text-danger">List of Users</h1> 
                </div>
                <div class="col-lg-4  col-sm-12"></div>
        
             </div>
            </div>
        </div>
    </header>
   
    <div class="search-bar-div">
    <div class="container ">
        <div class="row">
                <div class="col-md-4">	
                    <label id="ab">Fetch Results By:</label>
    <select class="custom-select" style="width:200px;" id="fetchval" name="fetchby" >
                        <option value="none">Not Called</option>
                        <option value="call back">Call Back</option>
                        <option value="not reachable">Not Reachable</option>
                        <option value="switched off">Switched Off</option>
                        <option value="arrange demo">Arrange Demo</option>
                        <option value="demo done">Demo Done</option>
                        <option value="enrolled">Enrolled</option>
                        <option value="on progress">On Progress</option>
                        <option value="course completed">Completed</option>
</select>
</div>
               
<div class="col-md-4"> 
         <div class="form-group search-bar">
        <div class="input-grop">
        <input type="text" name="search_text" id="search_text" placeholder="Enter User Name" class="form-control"/>

        </div>
    </div>
    <br/>
        <!-- <div class="row">
            <div class="col-md-8">
        
            </div>
            <div class="col-md-4">
            </div>
        </div> -->
</div>

     <div class="col-md-4">
                     <div class="float-right" >
                <button  id="removeFilter" class="btn btn-secondary">Remove filter</button>
                <a href="javascript:void(0);" class="btn btn-success" data-type="add" data-toggle="modal" data-target="#modalUserAddEdit"><i class="plus"></i> New User</a>
            </div>
        </div>

</div>
</div>
    </div>



<div class="container">
    <div class="row">
    
<div>
</div>
<div id="result"></div>

        <div class="statusMsg"></div>
        <div id="table-container">
        <!-- List the users -->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Action Type</th>
                    <th>Course</th>
                    <th>Status</th>
                    <th>Comments</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="userData">
                <?php if(!empty($users)){ 
                    $counter=1;
                    foreach($users as $row){ 
                ?>
                <tr>
                    <td><?php echo '#'.$counter; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td><?php echo $row['action_type']; ?></td>
                    <td><?php echo $row['course_name']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['comments']; ?></td>
                    <td><?php echo $row['modified']; ?></td>
                    <!-- <th>Modified</th> -->

                    <td>
                    <div class="mt-4">
                        <a href="javascript:void(0);"  rowID="<?php echo $row['id']; ?>" data-type="edit" data-toggle="modal" data-target="#modalUserAddEdit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="javascript:void(0);"  onclick="return confirm('Are you sure to delete data?')?userAction('delete', '<?php echo $row['id']; ?>'):false;"><i class=" ml-3 fa fa-trash" aria-hidden="true"></i></a>
                      </div>
                    </td>
                </tr>
                <?php 
                        $counter++; 
                    } 
                    }else{ 
                ?>
                <tr><td colspan="5">No user(s) found...</td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>


<!-- Modal Add and Edit Form -->
<div class="modal fade" id="modalUserAddEdit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add New User</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="statusMsg"></div>
                
                <form role="form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                    </div>
                
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone no">
                    </div>
                     <!-- <div class="form-group">
                        <label for="mesage">Message</label>
                        <input type="text" class="form-control" name="message" id="message" placeholder="Enter Message">
                    </div>
                    <div class="form-group">
                        <label for="action type">Action Type</label>
                        <input type="text" class="form-control" name="action-type" id="action-type" placeholder="Enter Action Type">
                    </div> -->
                    <div class="form-group">
                        <label for="course name">Course Name</label>
                        <input type="text" class="form-control" name="course_name" id="course_name" placeholder="Enter Course name">
                    </div>
                    <div class="form-group">
                    <label for="status">Status</label>
                        <select name="drop-down" class="custom-select" id="status-dropdown">
                        <option value="none">Not Called</option>
                        <option value="call back">Call Back</option>
                        <option value="not reachable">Not Reachable</option>
                        <option value="switched off">Switched Off</option>
                        <option value="arrange demo">Arrange Demo</option>
                        <option value="demo done">Demo Done</option>
                        <option value="enrolled">Enrolled</option>
                        <option value="on progress">On Progress</option>
                        <option value="course completed">Completed</option>
                        </select>
                    </div>
                    <div class="form-group text-area">
                        <label for="comments">Comments</label>
                        <textarea class="form-control" id="comments" rows="3" placeholder="Enter Your comments....."
                                name="comments"></textarea>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="id"/>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="userSubmit">SUBMIT</button>
            </div>
        </div>
    </div>
</div>
<img src="images/loader.gif" style="display: none;" id="loaderImg" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script>
	// Update the users data list

function getUsers(){
    $.ajax({
        type: 'POST',
        url: 'userAction.php',
        data: 'action_type=view',
        success:function(response){
            $('#userData').html(response);
        },
        error:function(){
            alert('There is some errors!');
        }
    });
}

$(document).ready(function(){
    $('#search_text').keyup(function(){
        var txt = $(this).val();
        if(txt!=''){
         $.ajax({
                url : 'userAction.php',
                method : "POST",
                data : {search:txt},
                dataType : "text",
                  beforeSend: function(){
            $('#loaderImg').css({'position': 'absolute','top': '16%','left': '35%','z-index': '9999'}).show();
                 },
                success : function(data){
                    $('#result').html(data);
                     $('#loaderImg').hide();
                    $('#table-container').hide();
                }
            })
        }
        else{
            $(document).ready(function(){
                location.reload(true);
            })
            
        }
    })
})


 $(document).ready(function()
                     {
        $("#fetchval").on('change',function()
                         {
            var keyword = $(this).val();
            $.ajax(
            {
                url:'userAction.php',
                type:'POST',
                data:'request='+keyword,
                
                beforeSend: function(){
            frmElement = $("#modalUserAddEdit");
            frmElement.find('form').css("opacity", "0.5");
            $('#loaderImg').css({'position': 'absolute','top': '16%','left': '35%','z-index': '9999'}).show();
                 },
                success:function(data)
                {
                    $("#table-container").html(data);
                     frmElement.find('form').css("opacity", "");
                     $('#loaderImg').hide();
                },
            });
        });
    });

    //  $(document).ready(function()
    //                  {
    //     $("#excel").on('click',function()
    //                      {
           
    //         $.ajax(
    //         {
    //             url:'userAction.php',
    //             type:'POST',
    //             data:'exceldata',
                
    //             beforeSend: function(){
    //         frmElement = $("#modalUserAddEdit");
    //         frmElement.find('form').css("opacity", "0.5");
    //         $('#loaderImg').css({'position': 'absolute','top': '16%','left': '35%','z-index': '9999'}).show();
    //              },
    //             success:function(data)
    //             {
    //                 // $("#table-container").html(data);
    //                 //  frmElement.find('form').css("opacity", "");
    //                 //  $('#loaderImg').hide();
    //             },
    //         });
    //     });
    // });



    // $(document).ready(function()
    //                  {
    //     $("#removeFilter").click(function()
    //                      {
    //         // var keyword = $(this).val();
    //         $.ajax(
    //         {
    //             url:'userAction.php',
    //             type:'GET',
    //             data:'removeFilter',
                
    //             beforeSend: function(){
    //         frmElement = $("#modalUserAddEdit");
    //         frmElement.find('form').css("opacity", "0.5");
    //         $('#loaderImg').css({'position': 'absolute','top': '16%','left': '35%','z-index': '9999'}).show();
    //              },

    //             success:function(data)
    //             {
    //                 $("#table-container").html(data);
    //                  frmElement.find('form').css("opacity", "");
    //                  $('#loaderImg').hide();
    //             },
    //             error: function(error){
    //         alert('There are some technical erros! please try again after some time!');
    //     }
    //         });
    //     });
    //                  });
    


   
    

// Send CRUD requests to the server-side script
function userAction(type, id){
	//debugger;
    id = (typeof id == "undefined")?'':id;
    var userData = '', frmElement = '';
    if(type == 'add'){
        frmElement = $("#modalUserAddEdit");
        userData = frmElement.find('form').serialize()+'&action_type='+type+'&id='+id;
    }else if (type == 'edit'){
        frmElement = $("#modalUserAddEdit");
       userData =  frmElement.find('form').serialize()+'&action_type='+type;
       
          
        $('#modalUserAddEdit').modal('hide');
        window.location.reload();
        // 
    }else{
        frmElement = $(".row");
        userData = 'action_type='+type+'&id='+id;
    }
    // console.log(userData);
    frmElement.find('.statusMsg').html('');
    // jQuery also has diff methods for submitting a form
    /*
            - $.get()
            - $.post()
            - $.put()
            - $.delete()

            - $.ajax()

        Promises - Promises will be used to place Asynchronous Requests from client side to the server side. Behind the scnes Promises will be observing the requests and acts as per the response given server.

        Promises has the following states
            - resolve()
            - reject()
            //es6+
            - async()
            - await()
    */
    $.ajax({
        type: 'POST',
        url: 'userAction.php',
        dataType: 'JSON',
        data: userData,
        beforeSend: function(){
            
            frmElement.find('form').css("opacity", "0.5");
            $('#loaderImg').css({'position': 'absolute','top': '16%','left': '35%','z-index': '9999'}).show();
        },
        success:function(resp){
            frmElement.find('.statusMsg').html(resp.msg);
            if(resp.status == 1){
                if(type == 'add'){
                    frmElement.find('form')[0].reset();
                    $('#modalUserAddEdit').modal('hide');
                }
                getUsers();
            }
            frmElement.find('form').css("opacity", "");
            $('#loaderImg').hide();
        },
        error: function(error){
            alert('There are some technical erros! please try again after some time!');
        }
    });
}

// Fill the user's data in the edit form
function editUser(id){
    $.ajax({
        type: 'POST',
        url: 'userAction.php',
        dataType: 'JSON',
        data: 'action_type=data&id='+id,
        success:function(data){
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#phone').val(data.phone);
            $('#action-type').val(data.action_type);
            $('#course_name').val(data.course_name);
            $('#status').val(data.status);
            $('#message').val(data.message);
            $('#comments').val(data.comments);
        //  getUsers();

        }
    });
}

// Actions on modal show and hidden events
$(function(){
    $('#modalUserAddEdit').on('show.bs.modal', function(e){
        //console.log(e.relatedTarget);
        var type = $(e.relatedTarget).attr('data-type');
        var userFunc = "userAction('add');";
        if(type == 'edit'){
            userFunc = "userAction('edit');";
            var rowId = $(e.relatedTarget).attr('rowID');
            editUser(rowId);
        }
        $('#userSubmit').attr("onclick", userFunc);
    });
    
    $('#modalUserAddEdit').on('hidden.bs.modal', function(){
        $('#userSubmit').attr("onclick", "");
        $(this).find('form')[0].reset();
        $(this).find('.statusMsg').html('');
    });
});

document.getElementById('removeFilter').addEventListener('click',()=>{
    window.location.reload();
})

</script>
<footer class="container-fluid bg-4 text-center">
  <p>footer</p> 
</footer>
</body>
</html>
<?php
$con=mysqli_connect('localhost','root','','ninegloab');
if(isset($_POST['excelsubmit'])){
	$file=$_FILES['doc']['tmp_name'];
	
	$ext=pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
	if($ext=='xlsx'){
		require('PHPExcel/PHPExcel.php');
		require('PHPExcel/PHPExcel/IOFactory.php');
		
		
		$obj=PHPExcel_IOFactory::load($file);
		foreach($obj->getWorksheetIterator() as $sheet){
			$getHighestRow=$sheet->getHighestRow();
			for($i=0;$i<=$getHighestRow;$i++){
				$name=$sheet->getCellByColumnAndRow(0,$i)->getValue();
                $email=$sheet->getCellByColumnAndRow(1,$i)->getValue();
				$message=$sheet->getCellByColumnAndRow(2,$i)->getValue();
                
				if($name!=''){
					mysqli_query($con,"insert into excel(name,email,message) values('$name','$email','$message')");
				}
			}
		}
	}else{
		echo "Invalid file format";
	}
}
?>