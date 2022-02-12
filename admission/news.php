<?php

include "handleadmissionfiles/admissionconfig.php";

if(isset(
    $_POST['submit'],
    

)){
    $dateposted = trim($_POST['dateposted']);
    $news = trim($_POST['news']);
    

    //validate entries
    //validate passsword
       
        $sql="INSERT INTO `news`(`dateposted`,`news`) 
        VALUES ('$dateposted','$news')";

        $result=mysqli_query($link,$sql);

        if($result){
            echo '<script type="text/javascript"> alert("Submission Successful")</script>';
             header("Location:news.php");
    
        }else{
            echo '<script type="text/javascript"> alert("ERROR submitting to the database, that email already exists $sql")</script>'.mysqli_connect_error($link);
            header("Location:news.php");
        }
    

    //close connection
    mysqli_close($link);

}
?>
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
       
#sidebar {
  position:absolute;
  left:0px;
  width:200px;
  height:100%;
  background:brown;
  transition:all 300ms linear;
 
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
            top: 0px;
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
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Welcome,&#160;<?php session_start();
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
<form class="row g-3" action="news.php" method="post">
<h1>Please make your announcements below</h1>
    <div class="col-md-4">
    <label1class="form-label">Date Posted:&#160</label1>
  <input type="date" class="center" name="dateposted">
  </div>

    <div class="col-md-12">
    <label1 class="form-label">Announcement:</label1>
    <textarea cols="30" class="form-control" name="news" ></textarea>
  </div><br>

  <div class="col-12">
  <input type="hidden" name="id" value="<?php echo $id;?>">
    <button type="submit" class="btn btn-primary" name="submit">Make Announcement</button>
  
  </div>
  
</form>
<hr>
   

    <table>
<tr>
<h3>Announcement</h3>
     <th>Date Posted</th>
     <th>Info</th>
     <th>Action</th>
    
</tr><br>     

<?php
include "handleadmissionfiles/admissionconfig.php";
$sql="SELECT * FROM `news`";

$result=mysqli_query($link,$sql);
?>

<?php

while($row=mysqli_fetch_assoc($result)){
?>
                  <tr>
                 <td><?php echo $row['dateposted'];?></td>
                 <td><?php echo $row['news'];?></td>
                 <td><?php echo "<a href='delete.php?id=".$row['id']."'>";?><i class="fas fa-trash-alt">DELETE</i></a><br>

            </tr>
            <?php
     }
     ?>
     
     
</table>
<div>
      

</body>

</html>
