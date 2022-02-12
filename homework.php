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
.shadow-lg{
  margin-top: 53px;
            padding: 20px;
            margin-left:205px;
            margin-right:10px;
          text-align: center;
          font-size: 20px;
          border: 1px solid brown;

        }
        .shadow-lg p{
            color: black;
            background-color: brown;
            border: 1px solid black;
            text-transform: uppercase;
            font-size: 30px;
        }
        .info{
          color: blue;
          text-decoration: underline;
          text-transform: uppercase;
        }
        .card{
          border: 1px solid brown;
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
      <div class="shadow-lg p-3 mb-5 bg-body rounded">
        <p>Do The homework that applies</p>
        <?php
      
     
      include "handlefiles/config.php";

      $sql="SELECT * FROM `homework`";

      $result=mysqli_query($link,$sql);
      ?>

      <container class="container-fluid">
      <div class="row">
    
     
   <?php
      
      while($row=mysqli_fetch_assoc($result)){
    ?>

<div class="col-md-12 md-1 mt-1">
       <div class="card">
        <div class="card-body">
          <div class="row">
          <h4 class="desc col-md-4 md-1 mt-1"><div class="info">Date Posted:&#160;</div><?php echo $row['dateposted'];?></h4>
          <h4 class="desc col-md-4 md-1 mt-1"><div class="info">Grade:&#160;</div><?php echo $row['grade'];?></h4>
          <h4 class="desc col-md-4 md-1 mt-1"><div class="info">Stream:&#160;</div><?php echo $row['stream'];?></h4>
         <h4 class="desc"><div class="info">Homework:&#160;</div><?php echo $row['homework'];?></h4> 
      </div>
       

      </div>
        </div>
      </div>   

      </container>
        
     <?php
     
      
    }
     

      ?>
           
      </div>
      

</body>

</html>
