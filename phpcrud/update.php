<?php
include 'connect.php';

if(isset($_POST['updateid'])){
    $user_id=$_POST['updateid'];

    $sql="Select * from `cruduser` where id=$user_id";
    $result=mysqli_query($con,$sql);
    $response=array();
    while ($row=mysqli_fetch_assoc($result)){
        $response=$row;
    }
    echo json_encode($response);
}else{
    $response['status']=200;
    $response['message']="Invalid or Data not Found";
}



//update query
if(isset($_POST['hiddendata'])){
    $uniqueid=$_POST['hiddendata'];
    $first_name=$_POST['updatefirst_name'];
    $last_name=$_POST['updatelast_name'];
    $email=$_POST['updatemail'];

    $sql="update `cruduser` set first_name='$first_name',last_name='$last_name', email='$email' where id=$uniqueid";

    $result=mysqli_query($con,$sql);

}
?>