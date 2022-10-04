<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
 </style>
</head>
<body style="background-color:bisque;padding:30px;">
    <div class="container">
        <div class="alert alert-danger d-none" id="myAlertMsg" role="alert">
          <h4 class="alert-heading">create a valid student</h4>
        </div>
        </div>
   <div class="container">
   <div class="card text-start">
    <!-- Modal trigger button -->
    <button type="button" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
      Create New Student Information
    </button>
    
    <!-- Modal Body -->
    
    
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <form id="saveStudent">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="student name">

                            <label for="name">LName</label>
                            <input type="text" class="form-control" name="lname" placeholder="student Last name">

                            <label for="name">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="student Email">

                            <label for="name">phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="student Phone">

                            <label for="name">Departement</label>
                            <input type="text" class="form-control" name="dep" placeholder="student Dep">
                       
                    </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
            </form>
            </div> 
        </div>
    </div>
    
    
    <!-- Optional: Place to the bottom of scripts -->

    

      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-primary" id="listOfStudent">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">LName</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Dep</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;
                    $con = mysqli_connect('localhost' , 'root' ,'', 'student');
                    // $query = "SELCET * FROM studen ";
                    $query = "SELECT * FROM studen ";
                    $query_run = mysqli_query($con, $query);
                    if(mysqli_num_rows($query_run)>0){
                        foreach($query_run as $studen){
                            ?>
                        
                
                    <tr class="">
                        <td scope="row"><?= $i++  ?></td>
                        <td><?= $studen['name'];  ?></td>
                        <td><?= $studen['lname']; ?></td>
                        <td><?= $studen['email']; ?></td>
                        <td><?= $studen['phone']; ?></td>
                        <td><?= $studen['Dep'];   ?></td>
                        <td>                        
                        <div class=" "></div><button class="btn btn-info btn-sm">info</button>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    <?php
                        }
                    }
                    
                ?>
                </tbody>
            </table>
        </div>
      </div>
    </div>
   </div>
</body>
<script src="./jQuery.js"></script>
<script src="./javaS.js"></script>
</html>