<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PUPIL HOME</title>

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
        table,th,td,tr{
        border: 2px solid brown;
        width: 100%;
        table-layout: fixed;
        text-align: center;
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
}
.btn{
      background-color:brown !important;
      margin:5px;
    }
    .h4{
      color: brown;
      text-align: center;
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
  <a href="dashboard.php"><div class="item"><i class="fas fa-tachometer-alt">&#160 Dashboard</i></div></a>
  <a href="homework.php"><div class="item"><i class="fas fa-laptop-house">&#160 homework</i></div></a>
  <a href="viewresult.php"><div class="item"><i class="fas fa-eye">&#160 View Result</i></div></a>
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
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Welcome,&#160;<?php session_start();
                        if(!isset($_SESSION['pupilname'])){
                          echo "you're not logged in!";
                          header ("Location:logout.php");
                        }else{
                          echo $_SESSION['pupilname'] ;
                        } ?></a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" id="logout" href="logout.php">logout&#160<i class="fas fa-sign-out-alt"></i></a></li>
                        </ul>
                    </li>
</nav></div>
        </div>
      </div>
      <div class="container overflow-hidden">
      <form class="row g-3" action="viewresult.php" method="post">
      <label1 class="h4">Key in Admission Number and Password to View Results </label1>
  <div class="col-md-6">
    <label1 class="h3">Admission Number</label1>
    <input type="text" class="form-control" id="inputEmail4" name="adm_no" required>
  </div>
  <div class="col-md-6">
    <label1 class="h3">Password</label1>
    <input type="text" class="form-control" id="inputEmail4" name="password" required>
  </div>
  <div class="col-12">
    <button type="submit" name="search" class="btn btn-primary">Search</button>
  </div>
</form><br>
<hr>
  <?php
     include "handlefiles/config.php";

     if(isset($_POST['search'])){
         $adm_no = $_POST['adm_no'];
         $password = $_POST['password'];

         $sql = "SELECT * FROM `result` AS rt,`pupil` AS pl WHERE rt.adm_no='".$adm_no."'AND pl.password='".$password."'";
         $result = mysqli_query($link,$sql);

         while($row = mysqli_fetch_array($result)){
            ?>
            <div class="row gx-5">
    <div class="col-12">
     <table class="table caption-top">
     <div class="p-3 border bg-light"><i class="fas fa-user-secret">&#160;PROVISIONAL RESULTS</i></div>
  <tbody>
     
  <tr>
      <th scope="row">YEAR</th>
      <td><?php echo $row['resultyear'];?></td>
    </tr>
  
    <tr>
      <th scope="row">TERM</th>
      <td><?php echo $row['term'];?></td>
    </tr>
    <tr>
      <th scope="row">GRADE</th>
      <td><?php echo $row['grade']; ?></td>
    </tr>
    <tr>
      <th scope="row">STREAM</th>
      <td><?php echo $row['stream']; ?></td>
    </tr>
    <tr>
      <th scope="row">ENGLISH</th>
      <td><?php echo $row['english']; ?></td>
    </tr>
    <tr>
      <th scope="row">MATHS</th>
      <td><?php echo $row['maths']; ?></td>
    </tr>
    <tr>
      <th scope="row">ENVIRONMENTAL</th>
      <td><?php echo $row['environmental']; ?></td>
    </tr>
    <tr>
      <th scope="row">PSYCHOMOTOR</th>
      <td><?php echo $row['psychomotor']; ?></td>
    </tr>
    <tr>
      <th scope="row">HYGIENE</th>
      <td><?php echo $row['hygiene']; ?></td>
    </tr>
    <tr>
      <th scope="row">SCIENCE</th>
      <td><?php echo $row['science']; ?></td>
    </tr>
    <tr>
      <th scope="row">ART AND CRAFT</th>
      <td><?php echo $row['artcraft']; ?></td>
    </tr>
    <tr>
      <th scope="row">KISWAHILI</th>
      <td><?php echo $row['kiswahili']; ?></td>
    </tr>
    <tr>
      <th scope="row">CREATIVE</th>
      <td><?php echo $row['creative']; ?></td>
    </tr>
    <tr>
      <th scope="row">HOME SCIENCE</th>
      <td><?php echo $row['hscience']; ?></td>
    </tr>
    <tr>
      <th scope="row">MUSIC</th>
      <td><?php echo $row['music']; ?></td>
    </tr>
    <tr>
      <th scope="row">RELIGION</th>
      <td><?php echo $row['religion']; ?></td>
    </tr>
    <tr>
      <th scope="row">AGRICULTURE</th>
      <td><?php echo $row['agriculture']; ?></td>
    </tr>
    <tr>
      <th scope="row">SOCIAL STUDIES</th>
      <td><?php echo $row['socialstudies']; ?></td>
    </tr>
    <tr>
      <th scope="row">TOTAL</th>
      <td><?php echo $row['total']; ?></td>
    </tr>
  </tbody>
  <?php

}

}
?>
  </div>
</table>
</div>
</div>

     
     
  
                      </div> -->
      

</body>

</html>
