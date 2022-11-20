<?php
include 'connect.php';


extract($_POST);
if(isset($_POST['first_nameSend']) && isset($_POST['last_nameSend']) && isset($_POST['emailSend'])){
    $sql="insert into `cruduser` (first_name,last_name,email)
    values('$first_nameSend','$last_nameSend','$emailSend')";

    $result=mysqli_query($con,$sql);
}


?>