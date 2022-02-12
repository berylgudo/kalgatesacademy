<?php

include "admissionconfig.php";

if(isset(
    $_POST['submit'],
    

)){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $stream = trim($_POST['stream']);
    $contact= trim($_POST['contact']);
    $email = trim($_POST['email']);
    $grade = trim($_POST['grade']);
    $gender= trim($_POST['gender']);
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
       
        $sql="INSERT INTO `teacher`( `username`, `password`, `stream`, `contact`, `email`, `grade`, `gender`) 
        VALUES ('$username','$store_password','$stream','$contact','$email','$grade','$gender')";

        $result=mysqli_query($link,$sql);

        if($result){
            echo "<div class='alert alert-success' role='alert'>Teacher Added successfully</div>";
             header("Location:../addteacher.php");
    
        }else{
            echo "<div class='alert alert-success' role='alert'>Teacher Added successfully</div>".mysqli_connect_error($link);
            header("Location:../addteacher.php");
        }
    }

    //close connection
    mysqli_close($link);

}
?>

  