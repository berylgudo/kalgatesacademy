<?php

include "admissionconfig.php";

if(isset(
    $_POST['submit'],
    

)){

    $pupilname = trim($_POST['pupilname']);
    $adm_no = trim($_POST['adm_no']);
    $password = trim($_POST['password']);
    $gender= trim($_POST['gender']);
    $grade = trim($_POST['grade']);
    $stream = trim($_POST['stream']);
    $dob = trim($_POST['dob']);
    $contact = trim($_POST['contact']);
    $parentname = trim($_POST['parent_name']);
    $email = trim($_POST['email']);


    //validate entries
    //validate passsword

    if(strlen($password)<6){
        $password_error="Password must have 6 characters";
        echo "$password_error";
    }else{
        $store_password=$password;
    }

    //check errors before insert data query

    if (empty($password_error) and empty($confirm_pass_error)) {
       
        $sql="INSERT INTO `pupil`( `pupilname`, `adm_no`, `password`, `gender`, `grade`, `stream`,`dob`, `contact`, `parent_name`, `email`) 
        VALUES ('$pupilname','$adm_no','$store_password','$gender','$grade','$stream','$dob','$contact','$parentname','$email')";

        $result=mysqli_query($link,$sql);

        if($result){
            echo "<div class='alert alert-success' role='alert'>Pupil Added successfully</div>";
            header("Location: ../addpupil.php");
    
        }else{
            echo "<div class='alert alert-success' role='alert'>Pupil Not Added</div>";
            header("Location: ../addpupil.php");
        }
    }

    //close connection
    mysqli_close($link);

}
?>

  