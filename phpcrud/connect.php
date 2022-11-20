<?php

$con=new mysqli('localhost','root','','crudtest');
if($con){
   // echo "Connection Successful";
}else{
    die(mysqli_error($con));
}
?>