<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMISSION HOME</title>

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
  padding-bottom: 5000px;
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
          background-color: brown !important;
        }
        h1{
          text-align: center;
          border: 1px solid brown;
        }
.nav-link, .fab{
    color: black !important;
}
.fab:hover{
    text-decoration: underline;
}
.fa{
    color: black;
}
.fa:hover{
    color:white
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
  <a href="addpupil.php"><div class="item"><i class="fa fa-user-plus"> &#160 Add a Pupil</i></div></a>
  <a href="addteacher.php"><div class="item"><i class="fa fa-users"> &#160 Add a Teacher</i></div></a>
  <a href="viewteacher.php"><div class="item"><i class="fas fa-binoculars"> &#160 View Teacher</i></div></a>
  <a href="viewpupil.php"><div class="item"><i class="fas fa-street-view"> &#160 View Pupil</i></div></a>
  <a href="News.php"><div class="item"><i class="fas fa-file-alt"> &#160 News</i></div></a>
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
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Welcome,&#160<?php session_start();
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
<form class="row g-3"action="handleadmissionfiles/handleaddteacher.php" method="POST">
  <h1>ADD TEACHER TO DATABASE</h1>
  <div class="col-md-4">
    <label1 class="form-label">Teacher Name</label1>
    <input type="text" name="username" class="form-control">
  </div>
  <div class="col-md-4">
    <label1 class="form-label">Password</label1>
    <input type="password" name="password" class="form-control">
  </div>
  <div class="col-md-4">
    <label1 class="form-label">Stream</label1>
    <select class="form-select" name="stream" aria-label="Default select example">
  <option selected>Select Stream</option>
  <option value="East" name="stream">East</option>
  <option value="West" name="stream">West</option>
  <option value="South" name="stream">South</option>
</select>
  </div>
  <div class="col-6">
    <label1 class="form-label">Contact Number</label1>
    <input type="text" name="contact" class="form-control"  placeholder="07...">
  </div>
  <div class="col-6">
    <label1 class="form-label">Email</label1>
    <input type="email" name="email" class="form-control" placeholder="kim@gmail.com">
  </div>
  <div class="col-md-6" >
    <label1 class="form-label">Grade</label1>
    <select class="form-select" name="grade" aria-label="Default select example">
  <option selected >Select Grade</option>
  <option value="baby class"  name="grade">baby class</option>
  <option value="PP1"  name="grade">PP1</option>
  <option value="PP2"  name="grade">PP2</option>
  <option value="grade one"  name="grade">grade one</option>
  <option value="grade two"  name="grade">grade two</option>
  <option value="grade three"  name="grade">grade three</option>
  <option value="grade four"  name="grade">grade four</option>
  <option value="grade five"  name="grade">grade five</option>
  <option value="grade six"  name="grade">grade six</option>
</select>
  </div>
  <div class="col-md-6">
    <label1 for="inputState" class="form-label">Gender</label1>
    <select id="inputState" name="gender" class="form-select">
      <option selected>Select Gender</option>
      <option value="Male" name="gender">Male</option>
      <option value="Female" name="gender">Female</option>
    </select>
  </div>
 
  <div class="col-12">
    <button type="submit" name ="submit" class="btn btn-primary">ADD TEACHER</button>
  </div>
</form>
<div>
      

</body>

</html>
