<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NEWS</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap');
        body{
            font-family: 'Josefin Sans', sans-serif;
        }
        .main_content{
            background-color: brown;
            width: 100%;
            margin-right: 10px;
            padding: 2%;
            font-size: large;
        }
        .content{
            margin-top: 1%;
            margin-left: 2%;
            margin-right: 2%;
            font-size: large;
            
            
        }
        .nav-link{
            color: black !important;

        }
        .nav-link:hover, a:hover{
            color: brown !important;
            text-decoration: underline;
            
        }
        .dropdown-item{
          color: black !important;
        }
        .dropdown-item:hover, a:hover{
            color: brown !important;
            text-decoration: underline;
            background-color: azure;
            
        }
        
        label{
            color: brown;
        }
        .fab{
          color: #000;
        }
        .fab:hover{
          text-decoration: underline;
          color: brown;

        }
        h5, p, span{
          color: black;
          font-size: 30px;
          font-weight: bold;
        }
        .shadow-lg{
          margin: 2%;
          margin-left: 15%;
          margin-right: 15%;
          text-align: center;
          font-size: 20px;
          border: 1px solid brown;

        }
        .shadow-lg p{
            color: black;
            background-color: brown;
        }
  

        
    </style>
</head>

<body>
    <div class="main_content">
        <div class="row">
          <div class="col">
            <a href="https://web.facebook.com/Kalgatesacademy/?_rdc=1&_rdr"><i class="fab fa-facebook">Our facebook Page</i></a>
          </div>
          <div class="col-md-auto">
            <a class="nav-link active" aria-current="page" href="services.html">SERVICES</a>
          </div>
          <div class="col col-lg-2">
            <a class="nav-link active" aria-current="page" href="news.php">NEWS</a>
          </div>
        </div>
      </div>

      <div>
        <div class="content">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand" >
                    <img src="images/badge.jpg" alt="" width="70" height="70" class="d-inline-block align-text-top">
                   <label> KalgatesAcademy</label>
                  </a>
                  <ul class="nav justify-content-end">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.html">HOME</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">ABOUT</a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="founder.html">Founder</a></li>
                          <li><a class="dropdown-item" href="anthem.html">School Anthem</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">ACADEMICS</a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Calender</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">PORTALS</a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Staff Portal</a></li>
                          <li><a class="dropdown-item" href="login.php">Pupil Portal</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">ADMISSIONS</a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="feestructure.html">Fee Structure</a></li>
                          <li><a class="dropdown-item" href="#">Admission Requirements </a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="contactus.html">CONTACT US</a>
                    </li>
                  </ul>
                </div>
                
              </nav>
      </div>
      <div class="shadow-lg p-3 mb-5 bg-body rounded">
        <p>Latest News</p>
        <?php
      
     
      include "handlefiles/config.php";

      $sql="SELECT * FROM `news`";

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
          
          <h4 class="desc"><label>Date Posted:&#160;<?php echo $row['dateposted'];?></label></h4>
         <h4 class="desc"><?php echo $row['news'];?></h4> 
       

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
