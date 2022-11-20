<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>phpcrud</title>
    <!--bootstrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
   


<!-- Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Record</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
        <label for="completefirst_name" class="form-label">First Name</label>
        <input type="text" class="form-control" id="completefirst_name"  placeholder = "First Name">
      </div>
      <div class="mb-3">
        <label for="completelast_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="completelast_name"  placeholder = "Last Name">
      </div>
      <div class="mb-3">
        <label for="completemail" class="form-label">Email Address</label>
        <input type="text" class="form-control" id="completemail"  placeholder = "Email Address">
      </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
        <button type="button" class="btn btn-primary" onclick="adduser()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!--update model--->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
        <label for="updatefirst_name" class="form-label">First Name</label>
        <input type="text" class="form-control" id="updatefirst_name"  placeholder = "First Name">
      </div>
      <div class="mb-3">
        <label for="updatelast_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="updatelast_name"  placeholder = "Last Name">
      </div>
      <div class="mb-3">
        <label for="updatemail" class="form-label">Email Address</label>
        <input type="text" class="form-control" id="updatemail"  placeholder = "Email Address">
      </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="hidden" id="hiddendata">
        <button type="button" class="btn btn-primary" onclick="updateDetails()" >Update</button>
      </div>
    </div>
  </div>
</div>




  <!--    add button  --->
    <div class ="container my-3">
        <h1 class="text-center">PHP MySQL CRUD</h1>
        
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#completeModal">
        Add New Record
        </button>

        <div id="displayDataTable">
          
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    <script>
      
      $(document).ready(function(){
        displayData();
      });
      

      //display function

      function displayData(){
        var displayData="true";
        $.ajax({
           url:"display.php",
           type:'post',
           data:{
            displaySend:displayData
           },
           success:function(data,status){
            $('#displayDataTable').html(data);
           }
        });
      }



        function adduser(){
            var first_nameAdd=$('#completefirst_name').val();
            var last_nameAdd=$('#completelast_name').val();
            var emailAdd=$('#completemail').val();

            $.ajax({
                url:"insert.php",
                type:'post',
                data:{
                    first_nameSend:first_nameAdd,
                    last_nameSend:last_nameAdd,
                    emailSend:emailAdd,
                },
                success:function(data,status){
                    //function to display data;
                    // console.log(status);
                    $('#completeModal').modal('hide');
                    displayData();
                }
            });
        }

  //delete record
        function DeleteUser(deleteid){
          $.ajax({
            url:"delete.php",
            type:'post',
            data:{
              deletesend:deleteid
            },
            success:function(data,status){
              displayData();
            }
          });
        }
  //update function
        
        function GetDetails(updateid){
          $('#hiddendata').val(updateid);

          $.post("update.php",{updateid:updateid},function(data,status){
            var userid=JSON.parse(data);
            $('#updatefirst_name').val(userid.first_name);
            $('#updatelast_name').val(userid.last_name);
            $('#updateemail').val(userid.email);
          });

          $('#updateModal').modal("show");
       }

  //onclick update function
       function updateDetails(){
        var updatefirst_name=$('#updatefirst_name').val();
        var updatelast_name=$('#updatelast_name').val();
        var updatemail=$('#updatemail').val();
        var hiddendata=$('#hiddendata').val();

        $.post("update.php",{
          updatefirst_name:updatefirst_name,
          updatelast_name:updatelast_name,
          updatemail:updatemail,
          hiddendata:hiddendata
   },function(data,status){
    $('#updateModal').modal('hide');
    displayData();

   });
   }
      
       
    </script>

</body>
</html>