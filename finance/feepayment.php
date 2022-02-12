<?php session_start(); ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FINANCE HOME</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript">
function toggleSidebar(ref){
  document.getElementById("sidebar").classList.toggle('active');
}
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap');
        body{
            font-family: 'Josefin Sans', sans-serif;
        }
        * {
  margin:0px;
  padding:0px;
  box-sizing:border-box;
  font-family:sans-serif;
}
 
#sidebar {
  position:absolute;
  left:0px;
  width:200px;
  height:100%;
  background:brown;
  transition:all 300ms linear;
  margin-bottom: -5000px; /* any large number will do */
  padding-bottom: 5000px
}
#sidebar.active {
  left:-200px;
}
#sidebar .toggle-btn {
  position:absolute;
  left:220px;
  top:10px;
}
#sidebar .toggle-btn span {
  display:block;
  width:30px;
  height:5px;
  background:#151719;
  margin:5px 0px;
  cursor:pointer;
}
#sidebar div.list div.item {
  padding:15px 10px;
  border-bottom:1px solid #444;
  border-top:1px solid #444;
  color:#fcfcfc;
  text-transform:uppercase;
  font-size:15px;
}
label{
    font-size: 20px;
    font-weight: bold;
    text-align: center;
   padding: 18px;
   color: white;
}
.main_content{
    background-color: brown;
            width: 100%;
            margin-right: 10px;
            font-size: large;
            padding: 3.5px;
            border-bottom:1px solid #444;
}
.container{
            background-color: white;
            margin-top: 53px;
            padding: 20px;
            margin-left:205px;
            border:1px solid brown; 
            
        }
        .btn{
      background-color:brown !important;
      margin:5px;
    }

.nav-link, .fab{
    color: black !important;
}
.fab:hover{
    text-decoration: underline;
}
.fas{
    color: black;
}
.fas:hover{
    color:white
}
#logout{
    text-align:center;
}
#logout:hover{
    background-color:brown !important;
}table,th,td,tr{
        border: 0.5px solid black;
        width: 100%;
        table-layout: fixed;
        text-align: center;
       
    }
    .border{
      padding: 20px;
    }

        
    </style>
</head>

<body>
<div id="sidebar">
  <div class="toggle-btn" onclick="toggleSidebar(this)">
    <span></span>
    <span></span>
    <span></span>
  </div> 
  <label>Kalgates <span>Portal</span></label> 
  <div class="list">
  <a href="feepayment.php"><div class="item"><i class="fas fa-money-bill-alt">&#160 Fee Payment</i></div></a>
  </div>
</div>
<div class="main_content nav justify-content-end">
        <div class="row">
          <div class="col">
            <a href="https://web.facebook.com/Kalgatesacademy/?_rdc=1&_rdr"><i class="fab fa-facebook"></i></a>
          </div>
          <div class="col-md-auto">
          <nav class="navbar">
            <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Welcome,&#160;<?php 
                        if(!isset($_SESSION['uname'])){
                          echo "you're not logged in!";
                          header ("Location:logout.php");
                        }else{
                          echo $_SESSION['uname'] ;
                        } ?></a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" id="logout" href="logout.php">logout&#160<i class="fas fa-sign-out-alt"></i></a></li>
                        </ul>
                    </li>
</nav></div>
        </div>
      </div>
      <div class="container">
<form class="row g-3" action="feepayment.php" method="post">
  <div class="col-md-12">
    <label1 class="h3">Search pupil by admission number </label1>
    <input type="text" class="form-control" id="inputEmail4" name="adm_no" required>
  </div>
  <div class="col-12">
    <button type="submit" name="search" class="btn btn-primary">Search</button>
  </div>
</form><br>
<hr>

<table>
<tr>
<h3>Teacher's Details</h3>
     <th>Name</th>
     <th>adm_no</th>
     <th>Grade</th>
     <th>Stream</th>
     <th>Contact</th>
     <th>Total Billed</th>
     <th>Balance</th>
     <th>Action</th>
</tr><br>     

     <?php
     include "financeconfig.php";

     if(isset($_POST['search'])){
         $adm_no = $_POST['adm_no'];

         $sql = "SELECT * FROM `pupil` WHERE adm_no = '$adm_no'";
         $result = mysqli_query($link,$sql);

         while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                 <td><?php echo $row['pupilname'];?></td>
                 <td><?php echo $row['adm_no'];?></td>
                 <td><?php echo $row['grade'];?></td>
                 <td><?php echo $row['stream'];?></td>
                 <td><?php echo $row['contact'];?></td>
                 <td><?php echo $row['total_billed'];?></td>
                 <td><?php echo $row['balance'];?></td>
                 <td>
                     <?php echo "<a href='viewbalance.php?id=".$row['id']."'>";?><i class="btn btn-primary">View Balance</i></a>
                     <?php echo "<a href='payfee.php?id=".$row['id']."'>";?><i class="btn btn-primary">Pay Fee</i></a>
                 <?php echo "<a href='editfee.php?id=".$row['id']."'>";?><i class="btn btn-primary">Edit Fee</i></a>
                 <?php echo "<a href='backup.php?id=".$row['id']."'>";?><i class="btn btn-primary">Back Up</i></a></td>
                 
                 </td>
            </tr>
            <?php

         }

     }
     ?>
     
     
</table>
</form>
<div>

</body>

</html>
