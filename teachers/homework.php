<?php

include "teacherconfig.php";

if(isset(
    $_POST['submit'],
    

)){
    $dateposted = trim($_POST['dateposted']);
    $grade = trim($_POST['grade']);
    $stream = trim($_POST['stream']);
    $homework = trim($_POST['homework']);
    

    //validate entries
    //validate passsword
       
        $sql="INSERT INTO `homework`(`dateposted`, `grade`, `stream`, `homework`) 
        VALUES ('$dateposted','$grade','$stream','$homework')";

        $result=mysqli_query($link,$sql);

        if($result){
            echo '<script type="text/javascript"> alert("Submission Successful")</script>';
             header("Location:homework.php");
    
        }else{
            echo '<script type="text/javascript"> alert("ERROR submitting to the database, that email already exists $sql")</script>'.mysqli_connect_error($link);
            header("Location:homework.php");
        }
    

    //close connection
    mysqli_close($link);

}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TEACHER HOME</title>

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
    color:white;
}
#logout{
    text-align:center;
}
#logout:hover{
    background-color:brown !important;
}
table,th,td{
        border: 2px solid brown;
        width: 100%;
        table-layout: fixed;
        text-align: center;
    }
    .fa-trash-alt:hover{
      color:brown;
    }
    .col{
          text-align: center;
          margin-top: 3px;
        }
        .btn{
          background-color: brown !important;
        }
        h1{
          text-align: center;
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
  <a href="homework.php"><div class="item"><i class="fas fa-laptop-house">&#160homework</i></div></a>
  <a href="viewpupil.php"><div class="item"><i class="fas fa-street-view">&#160view pupil</i></div></a>
  <a href="viewpupil.php"><div class="item"><i class="fas fa-plus-square">&#160 ADD RESULT</i></div></a>
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
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Welcome,&#160;Tr.<?php session_start();
                        if(!isset($_SESSION['username'])){
                          echo "you're not logged in!";
                          header ("Location:logout.php");
                        }else{
                          echo $_SESSION['username'] ;
                        } ?></a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" id="logout" href="logout.php">logout&#160<i class="fas fa-sign-out-alt"></i></a></li>
                        </ul>
                    </li>
</nav></div>
        </div>
      </div>
      <div class="container">
<form class="row g-3" action="homework.php" method="post">
<h1>Post Homework Below</h1>
    <div class="col-md-4">
    <label1 class="form-label">Date Posted:&#160</label1>
  <input type="date" class="form-control" class="center" name="dateposted">
  </div>
  <div class="col-md-4" >
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
  <div class="col-md-4">
    <label1 class="form-label">Stream</label1>
    <select class="form-select" name="stream" aria-label="Default select example">
  <option selected >Select Stream</option>
  <option value="East" name="stream">East</option>
  <option value="West"  name="stream">West</option>
  <option value="South" name="steam">South</option>
</select>
  </div>

    <div class="col-md-12">
    <label1 class="form-label">Home Work:</label1>
    <textarea cols="30" class="form-control" name="homework" ></textarea>
  </div><br>

  <div class="col-12">
  <input type="hidden" name="id" value="<?php echo $id;?>">
    <button type="submit" class="btn btn-primary" name="submit">Post Homework</button>
  
  </div>
  
</form>
<hr>
   

    <table>
<tr>
<h3>Announcement</h3>
     <th>Date Posted</th>
     <th>Grade</th>
     <th>Stream</th>
     <th>Home Work</th>
     <th>Action</th>
    
</tr><br>     

<?php
include "teacherconfig.php";
$sql="SELECT * FROM `homework`";

$result=mysqli_query($link,$sql);
?>

<?php

while($row=mysqli_fetch_assoc($result)){
?>
                  <tr>
                 <td><?php echo $row['dateposted'];?></td>
                 <td><?php echo $row['grade'];?></td>
                 <td><?php echo $row['stream'];?></td>
                 <td><?php echo $row['homework'];?></td>
                 <td><?php echo "<a href='delete.php?id=".$row['id']."'>";?><i class="fas fa-trash-alt">DELETE</i></a><br>

            </tr>
            <?php
     }
     ?>
     
     
</table>
<div>
      

</body>

</html>
