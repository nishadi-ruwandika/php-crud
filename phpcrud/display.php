<?php
include 'connect.php';
if(isset($_POST['displaySend'])){
    $table='<table class="table">
    <thead class="table-light">
      <tr>
      <th scope="col">id</th>
      <th scope="col">first name</th>
      <th scope="col">last name</th>
      <th scope="col">email</th>
      <th scope="col">operation</th>

      </tr>
    </thead>';
    $sql="Select * from `cruduser`";
    $result=mysqli_query($con,$sql);
    $number=1;
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];      //pass id in db row
        $first_name=$row['first_name'];
        $last_name=$row['last_name'];
        $email=$row['email'];    
        $table.='<tr>
        <td scope="row">'.$number.'</td>
        <td> '.$first_name.'</td>
        <td> '.$last_name.'</td>
        <td> '.$email.'</td>
        <td>
        <button class="btn btn-warning" onclick="GetDetails('.$id.')">Update</button>
        <button class="btn btn-danger" onclick="DeleteUser('.$id.')">Delete</button>
        </td>
        </tr>';
        $number++;
    }
    $table.='</table>';
    echo $table;
}

?>
