<?php
     include "handlefiles/config.php";
     session_start(); 

     if(isset($_POST['search'])){
         $adm_no = $_POST['adm_no'];
         $password = $_POST['password'];
         


         $sql = "SELECT * FROM `pupil` WHERE adm_no='".$adm_no."'AND password='".$password."'";
         $result = mysqli_query($link,$sql) or die( mysqli_error($link));
        //  $_SESSION['termm'] = $result;
      
         while($row = mysqli_fetch_array($result)){
                      
            if($result){
                $_SESSION['adm_no'] = $row['adm_no'];
                $_SESSION['resultyear'] = $row['resultyear'];
                $_SESSION['term'] = $row['term'];
                $_SESSION['pupilname'] = $row['pupilname'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['dob'] = $row['dob'];
                $_SESSION['contact'] = $row['contact'];
                $_SESSION['parent_name'] = $row['parent_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['grade'] = $row['grade'];
                $_SESSION['stream'] = $row['stream'];
                $_SESSION['total_billed'] = $row['total_billed'];
                $_SESSION['balance'] = $row['balance'];
                $_SESSION['english'] = $row['english'];
                $_SESSION['maths'] = $row['maths'];
                $_SESSION['environmental'] = $row['environmental'];
                $_SESSION['psychomotor'] = $row['psychomotor'];
                $_SESSION['hygiene'] = $row['hygiene'];
                $_SESSION['science'] = $row['science'];
                $_SESSION['artcraft'] = $row['artcraft'];
                $_SESSION['kiswahili'] = $row['kiswahili'];
                $_SESSION['creative'] = $row['creative'];
                $_SESSION['hscience'] = $row['hscience'];
                $_SESSION['music'] = $row['music'];
                $_SESSION['religion'] = $row['religion'];
                $_SESSION['agriculture'] = $row['agriculture'];
                $_SESSION['socialstudies'] = $row['socialstudies'];
                $_SESSION['total'] = $row['total'];
            	

                header("Location: dashboard.php");
                exit();
       } else{
        header("Location: pupillogin.php $sql").mysqli_error($link);
        exit();
            }
         } 
     }  
         
     ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PUPIL LOGIN</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap');
        body{
            font-family: 'Josefin Sans', sans-serif;
            background-image: url("images/compound.jpg");
            
        }
        img{
            margin-top: 0px;
        }
        form{
            margin-left: 550px;
            margin-right: 550px;
            margin-top: 40px;
            color: brown;
            background-color: white;
            padding: 45px;
            text-align: center;
        }
     
        .btn{
            margin-left: 0px;
            background-color: brown !important;
            color:black;
            font-weight: bold;
            margin-top: 10px;
        }
        label{
            font-size:12px;
            margin-top: 12px;
        }  
        .error {
   background: black;
   color: white;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

     

        
    </style>
</head>

<body>

    <form action="pupillogin.php" method="POST">
    <div class="text-center">
<img src="images/badge.jpg" class="rounded" width="150px" height="150px" alt="..."><br>
    </div>
        <label><i class="fa fa-users"></i>&#160PUPILS LOGIN FORM</label>
  <div class="col-6">
    <label><i class="fas fa-id-badge">&#160Admission&#160Number:</i></label>
    <input type="text" name="adm_no" required>
  </div>
  <div class="col-6">
    <label><i class="fas fa-user-lock">&#160Password:</i></label>
    <input type="password" name="password" required>
  </div>
  <div>
  <button class="btn btn-primary" name="search" type="submit">LOGIN</button>
</div>
    </form>
</body>

</html>
