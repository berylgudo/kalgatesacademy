<?php
     include "config.php";
     session_start(); 

     if(isset($_POST['search'])){
         $adm_no = $_POST['adm_no'];
         $password = $_POST['password'];

         $sql = "SELECT * FROM `pupil` WHERE adm_no='".$adm_no."'AND password='".$password."' limit 1";
         $result = mysqli_query($link,$sql);

         while($row = mysqli_fetch_array($result)){
            if($result){
                $_SESSION['adm_no'] = $row['adm_no'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['dob'] = $row['dob'];
                $_SESSION['contact'] = $row['contact'];
                $_SESSION['parent_name'] = $row['parent_name'];
                $_SESSION['email'] = $row['email'];
            	$_SESSION['id'] = $row['id'];

                header("Location: ../dashboard.php");
                exit();
       } else{
        header("Location: login.php $sql").mysqli_error($link);
        exit();
            }
         } }
     ?>