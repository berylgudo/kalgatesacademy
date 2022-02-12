<?php
     include "teacherconfig.php";
     session_start(); 

     if(isset($_POST['search'])){
         $uname = $_POST['uname'];
         $password = $_POST['password'];
         $id = (isset($_GET['id']) ? $_GET['id'] : '');

         $sql = "SELECT * FROM `teacher` WHERE username='".$uname."'AND password='".$password."' limit 1";
         $result = mysqli_query($link,$sql);

         while($row = mysqli_fetch_array($result)){
            if($result){
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
            	$_SESSION['id'] = $row['id'];

                header("Location: homework.php");
                exit();
       } else{
        header("Location: teacherlogin.php $sql").mysqli_error($link);
        exit();
            }
        

         }

     }
     ?> 
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TEACHER LOGIN</title>

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
        form{
            margin-left: 550px;
            margin-right: 550px;
            margin-top: 150px;
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
            margin-top: 20px;
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
    <form action="" method="POST" class="styleform" >
        <label><i class="fa fa-users"></i>TEACHERS LOGIN FORM</label>
        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
  <div class="col-8">
    <label>Name:</label>
    <input type="text" name="uname" required>
  </div>
  <div class="col-8">
    <label>Password:</label>
    <input type="password" name="password" required>
  </div>
  <div>
  <button class="btn btn-primary" name="search" type="submit">LOGIN</button>
</div>
    </form>
</body>

</html>

