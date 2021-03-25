<?php
// Include and initialize DB class
require_once 'DB.class.php';
$db = new DB();

// Database table name
$tblName = 'users';



if(!empty($_POST['search'])){
$filter = $_POST["search"];
$searched = $db->getSearch($tblName,$filter);
$output = '';
if(mysqli_num_rows($searched) > 0){
       $counter = 1;
            $output .= '<table class="table table-striped table-bordered">';
            $output .='<thead class="thead-dark">';
            $output .='<tr>';
            $output .='<th>ID</th>';
            $output .='<th>Name</th>';
            $output .= '<th>Email</th>';
            $output .= '<th>Phone</th>';
            $output .= '<th>Message</th>';
            $output .= '<th>Action Type</th>';
            $output .= '<th>Course</th>';
            $output .= '<th>Status</th>';
            $output .= '<th>Comments</th>';
            $output .= '<th>Modified</th>';
            $output .= '<th>Action</th>';
            $output .=   '</tr>';
            foreach($searched as $row){
             $output .= '
             <tr>
             <td>#'.$counter.'</td>
             <td>'.$row['name'].'</td>
             <td>'.$row['email'].'</td>
             <td>'.$row['phone'].'</td>
             <td>'.$row['message'].'</td>
             <td>'.$row['action_type'].'</td>
             <td>'.$row['course_name'].'</td>
             <td>'.$row['status'].'</td>
             <td>'.$row['comments'].'</td>
             <td>'.$row['modified'].'</td>
             
             <td>
             <div class="mt-4">
             <a href="javascript:void(0);"  rowID="'.$row['id'].'" data-type="edit" data-toggle="modal" data-target="#modalUserAddEdit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                 <a href="javascript:void(0);"  onclick="return confirm(\'Are you sure to delete data?\')?userAction(\'delete\', \''.$row['id'].'\'):false;"><i class="ml-3 fa fa-trash" aria-hidden="true"></i></a>
                 </div>
                 </td>
             </tr>';
             $counter++;
            }
            echo $output;

}
else{
     
            $output .= '<table class="table table-striped table-bordered">';
            $output .='<thead class="thead-dark">';
            $output .='<tr>';
            $output .='<th>ID</th>';
            $output .='<th>Name</th>';
            $output .= '<th>Email</th>';
            $output .= '<th>Phone</th>';
            $output .= '<th>Message</th>';
            $output .= '<th>Action Type</th>';
            $output .= '<th>Course</th>';
            $output .= '<th>Status</th>';
            $output .= '<th>Comments</th>';
            $output .= '<th>Action</th>';
            $output .= '<th>Modified</th>';
            $output .=   '</tr>';;
            $output .= '</thead>';
            $output .= '<tbody>';
            $output .= '<tr>';
            $output .= '<h5> No Users Found With that name</h5>';
            $output .= '</tr>';
            $output .= '</tbody>';
            $output .= '</table>';
            echo $output;
}
}

if(!empty($_POST['request'])){
    $request=$_POST['request'];
    //$users = $db->getRows($tblName);
    // $conn = mysqli_connect('localhost','root','','crud');
    // $query="select * from users where status='$request'";
    // $output=mysqli_query($conn,$query);
    $output = $db->filterData($tblName,$request);
    // $fullOutput = $db->$db->getRows($tblName);
    
    if(!empty($output)){
        // alert($output);
            $counter = 1;
            echo '<table class="table table-striped table-bordered">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Name</th>';
            echo  '<th>Email</th>';
            echo  '<th>Phone</th>';
            echo  '<th>Message</th>';
            echo  '<th>Action Type</th>';
            echo  '<th>Course</th>';
            echo  '<th>Status</th>';
            echo  '<th>Comments</th>';
            echo  '<th>modified</th>';
            echo  '<th>Action</th>';
             echo   '</tr>';

            foreach($output as $row){
                echo '<tr>';
                echo '<td>#'.$counter.'</td>';
                echo '<td>'.$row['name'].'</td>';
                echo '<td>'.$row['email'].'</td>';
                echo '<td>'.$row['phone'].'</td>';
                echo '<td>'.$row['message'].'</td>';
                echo '<td>'.$row['action_type'].'</td>';
                echo '<td>'.$row['course_name'].'</td>';
                echo '<td>'.$row['status'].'</td>';
                echo '<td>'.$row['comments'].'</td>';
                echo '<td>'.$row['modified'].'</td>';
                echo '<td><div class="mt-4"><a href="javascript:void(0);"  rowID="'.$row['id'].'" data-type="edit" data-toggle="modal" data-target="#modalUserAddEdit"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="javascript:void(0);"  onclick="return confirm(\'Are you sure to delete data?\')?userAction(\'delete\', \''.$row['id'].'\'):false;"><i class=" ml-3 fa fa-trash" aria-hidden="true"></i></a></div></td>';
                echo '</tr>';
                $counter++;
            }
        }
       
        // $db->disconnectdb();

        


}

// If the form is submitted
if(!empty($_POST['action_type'])){
    if($_POST['action_type'] == 'data'){
        // Fetch data based on row ID
        $conditions['where'] = array('id' => $_POST['id']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName, $conditions);
        
        // Return data as JSON format
        echo json_encode($user);
    }elseif($_POST['action_type'] == 'view'){
        // Fetch all records
        $users = $db->getRows($tblName);
        
        // Render data as HTML format
        if(!empty($users)){
            $counter = 1;
            foreach($users as $row){
                echo '<tr>';
                echo '<td>#'.$counter.'</td>';
                echo '<td>'.$row['name'].'</td>';
                echo '<td>'.$row['email'].'</td>';
                echo '<td>'.$row['phone'].'</td>';
                echo '<td>'.$row['message'].'</td>';
                echo '<td>'.$row['action_type'].'</td>';
                echo '<td>'.$row['course_name'].'</td>';
                echo '<td>'.$row['status'].'</td>';
                echo '<td>'.$row['comments'].'</td>';
                echo '<td>'.$row['modified'].'</td>';
                echo '<div class="mt-4">'; 
                echo '<td><a href="javascript:void(0);"  rowID="'.$row['id'].'" data-type="edit" data-toggle="modal" data-target="#modalUserAddEdit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="javascript:void(0);"  onclick="return confirm(\'Are you sure to delete data?\')?userAction(\'delete\', \''.$row['id'].'\'):false;"><i class="ml-3 fa fa-trash" aria-hidden="true"></i></a></td>';
                echo '</div>';
                echo '</tr>';
                $counter++;
            }
        }else{
            echo '<tr><td colspan="5">No user(s) found...</td></tr>';
        }
    }elseif($_POST['action_type'] == 'add'){
        $msg = '';
        $status = $verr = 0;
        
        // Get user's input
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        // $message = $_POST['message'];
        // $action_type = $_POST['action-type'];
        $course_name = $_POST['course_name'];
        $status = $_POST['drop-down'];
        $comments = $_POST['comments'];
        
        // Validate form fields
        if(empty($name)){
            $verr = 1;
            $msg .= 'Please enter your name.<br/>';
        }
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $verr = 1;
            $msg .= 'Please enter a valid email.<br/>';
        }
        if(empty($phone)){
            $verr = 1;
            $msg .= 'Please enter your phone no.<br/>';
        }
        
        if($verr == 0){
            // Insert data in the database
            $userData = array(
                'name'  => $name,
                'email' => $email,
                'phone' => $phone,
                // 'message' => $message,
                // 'action_type' => $action_type,
                'course_name' => $course_name,
                'status' => $status,
                'comments' => $comments,


            );
            
            $insert = $db->insert($tblName, $userData);
            
            if($insert){
                $status = 1;
                $msg .= 'User data has been inserted successfully.';
            }else{
                $msg .= 'Some problem occurred, please try again.';
            }
        }
        
        // Return response as JSON format
        $alertType = ($status == 1)?'alert-success':'alert-danger';
        $statusMsg = '<p class="alert '.$alertType.'">'.$msg.'</p>';
        $response = array(
            'status' => $status,
            'msg' => $statusMsg
        );
        echo json_encode($response);
    }elseif($_POST['action_type'] == 'edit'){
        $msg = '';
        $status = $verr = 0;
        
        if(!empty($_POST['id'])){
            // Get user's input
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            // $message = $_POST['message'];
            // $action_type = $_POST['action-type'];
            $course_name = $_POST['course_name'];
            $status = $_POST['drop-down'];
            $comments = $_POST['comments'];
            
            // Validate form fields
            if(empty($name)){
                $verr = 1;
                $msg .= 'Please enter your name.<br/>';
            }
            if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
                $verr = 1;
                $msg .= 'Please enter a valid email.<br/>';
            }
            if(empty($phone)){
                $verr = 1;
                $msg .= 'Please enter your phone no.<br/>';
            }
            
            if($verr == 0){
                // Update data in the database
                $userData = array(
                    'name'  => $name,
                    'email' => $email,
                    'phone' => $phone,
                    //  'message' => $message,
                    // 'action_type' => $action_type,
                    'course_name' => $course_name,
                    'status' => $status,
                    // 'comments'=> $comments,
                    
                    
                    
                );
                $condition = array('id' => $_POST['id']);
                $comment = $_POST['comments'];
                $id = $_POST['id'];
                $update = $db->update($tblName, $userData, $condition,$comment,$id);
                // $updated = $db->updated($table,$id);
                // echo $updated;
                if($update){
                    $status = 1;
                    $msg .= 'User data  has been updated successfully.';
                    // $msg .= $updated;
                }else{
                    $msg .= 'Some problem occurred, please try again.';
                }
            }
        }else{
            $msg .= 'Some problem occurred, please try again.';
        }
        
        // Return response as JSON format
        $alertType = ($status == 1)?'alert-success':'alert-danger';
        $statusMsg = '<p class="alert '.$alertType.'">'.$msg.'</p>';
        $response = array(
            'status' => $status,
            'msg' => $statusMsg
        );
        echo json_encode($response);
    }elseif($_POST['action_type'] == 'delete'){
        $msg = '';
        $status = 0;
        
        if(!empty($_POST['id'])){
            // Delate data from the database
            $condition = array('id' => $_POST['id']);
            $delete = $db->delete($tblName, $condition);
            
            if($delete){
                $status = 1;
                $msg .= 'User data has been deleted successfully.';
            }else{
                $msg .= 'Some problem occurred, please try again.';
            }
        }else{
            $msg .= 'Some problem occurred, please try again.';
        }  

        // Return response as JSON format
        $alertType = ($status == 1)?'alert-success':'alert-danger';
        $statusMsg = '<p class="alert '.$alertType.'">'.$msg.'</p>';
        $response = array(
            'status' => $status,
            'msg' => $statusMsg
        );
        echo json_encode($response);
    }
}

exit;
?>
