<?php
$con = mysqli_connect('localhost' , 'root' ,'', 'student');
if(isset($_POST['save_student'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $lname = mysqli_real_escape_string($con,$_POST['lname']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $dep = mysqli_real_escape_string($con,$_POST['dep']);
    if($name == NULL || $lname == NULL || $email== NULL ||$phone==NULL||$dep==NULL){
        $res = [
                "status"=>422,
                "message"=>"Please Fill All inputs",
                ];
                echo json_encode($res);
                return;
    }
        $query= " INSERT INTO studen(name,lname,email,phone,dep) VALUE('$name' , '$lname' , '$email' , '$phone' , '$dep')";

        $query_run = mysqli_query($con, $query);
        if($query_run){
            $res = [
                    "status"=>200,
                    "message"=>"student created successfully",
                    ];
                    echo json_encode($res);
                    return;
        }
}



?>