<?php
     include "financeconfig.php";
     session_start(); 

     if(isset($_POST['search'])){
         $name = $_POST['uname'];
         $password = $_POST['password'];
         $id = (isset($_GET['id']) ? $_GET['id'] : '');

         $sql = "SELECT * FROM `finance` WHERE uname='".$name."'AND passcode='".$password."' limit 1";
         $result = mysqli_query($link,$sql);

         while($row = mysqli_fetch_array($result)){
            if($result){
                $_SESSION['uname'] = $row['uname'];
                $_SESSION['email'] = $row['email'];
            	$_SESSION['id'] = $row['id'];
                header("Location: feepayment.php");
                echo "You have been loggedin successfully";
       } else{
        echo " login unsuccessful";
        header("Location: admissionlogin.php");
            }
        

         }

     }
     ?> 
     <!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FINANCE LOGIN</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap');
        body{
            font-family: 'Josefin Sans', sans-serif;
            background-color: brown;
            
        }
       .container{
            background-color: white;
            padding: 20px;
            padding-top: 20px;
            margin-top: 50px;
            margin-right:auto;
            margin-left:auto;
            color: brown;
            text-align: center;
            width: 50%;

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
       

     

        
    </style>
</head>

<body>
    <div class="container">
    <form action="" method="POST" class="styleform">
        <label><i class="fa fa-users"></i>FINANCE LOGIN FORM</label>
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="uname" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password"  class="form-control" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary" name="search">LOGIN</button>
    </form>
    </div>
</body>

</html>
