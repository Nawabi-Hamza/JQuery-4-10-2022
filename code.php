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
// ==============info
if(isset($GET['studen_id'])){
    $student_id = mysqli_real_escape_string($con , $GET['studen_id']);
    $query = "SELECT * FROM studens WHERE id = '$student_id'";
    $query_run = mysqli_query($con, $query);
    if(mysqli_num_rows($query_run) == 1){
        $student = mysqli_fecth_array($query_run);
        $res = [
            "status"=>200,
            "message"=>'student selected',
            "data"=>$student
        ];
        echo json_encode($res);
        return;
    }
    else{
        $student = mysqli_fecth_array($query_run);
        $res = [
            "status"=>404,
            "message"=>'student not expected',
            "data"=>$student
        ];
        echo json_encode($res);
        return;
    }
}



?>