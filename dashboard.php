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
    padding-left: 5px;
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
.fa-user-secret{
  color: black !important;
}
table,th,td,tr{
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
  <div class="row gx-5">
    <div class="col-6">
     <table class="table caption-top">
     <div class="p-3 border bg-light"><i class="fas fa-user-secret">&#160;Basic Information</i></div>
  <tbody>
    <tr>
      <th scope="row">Admission no</th>
      <td><?php echo $_SESSION['adm_no'] ; ?></td>
    </tr>
    <tr>
      <th scope="row">name</th>
      <td><?php echo $_SESSION['pupilname']; ?></td>
    </tr>
    <tr>
      <th scope="row">Gender</th>
      <td><?php echo $_SESSION['gender']; ?></td>
    </tr>
    <tr>
      <th scope="row">Date of Birth</th>
      <td><?php echo $_SESSION['dob']; ?></td>
    </tr>
  </tbody>
</table>
     
    </div>
    <div class="col-6">
    <table class="table caption-top">
      <div class="p-3 border bg-light"><i class="fas fa-info-circle">&#160;Contact Information</i></div>
      <tbody>
    <tr>
      <th scope="row">Phone Number</th>
      <td><?php echo $_SESSION['contact']; ?></td>
    </tr>
    <tr>
      <th scope="row">Parent Name</th>
      <td><?php echo $_SESSION['parent_name']; ?></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><?php echo $_SESSION['email']; ?></td>
    </tr>
  </tbody>
</table>
    </div>
    <div class="col-6">
    <table class="table caption-top">
      <div class="p-3 border bg-light"><i class="fas fa-hand-holding-usd">&#160;Financial Information</i></div>
      <tbody>
    <tr>
      <th scope="row">Total Billed</th>
      <td><?php echo $_SESSION['total_billed']; ?></td>
    </tr>
    <tr>
      <th scope="row">Balance</th>
      <td><?php echo $_SESSION['balance']; ?></td>
    </tr>
  </tbody>
</table>
    </div>
  </div>

</div>

</body>

</html>
