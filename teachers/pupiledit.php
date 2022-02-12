<?php
require_once "teacherconfig.php";
if(isset($_POST["id"]) and !empty($_POST["id"])) {

    //get hidden input
    $id=$_POST["id"];
    $pupilname = $_POST['pupilname'];
    $adm_no = $_POST['adm_no'];
    $gender = $_POST['gender'];
    $grade = $_POST['grade'];
    $stream = $_POST['stream'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $parent_name = $_POST['parent_name'];
    $email = $_POST['email'];
  
    //run the update query
    $sql = "UPDATE `pupil` SET `pupilname`='$pupilname',`adm_no`='$adm_no',`gender`='$gender',`grade`='$grade',`stream`='$stream',`dob`='$dob',`contact`='$contact',`parent_name`='$parent_name',`email`='$email' WHERE `id`='$id'";
    $result = mysqli_query($link,$sql);
    if($result){
        echo "Record udated successfully";
        
    }else{
        echo "could not update";
    }

}else{
    //pick id param $ values

    if(isset($_GET["id"]) and !empty($_GET["id"])){

        $id=trim($_GET["id"]);

        $sql="SELECT * FROM `pupil` WHERE id='$id'";

        $result=mysqli_query($link,$sql);

        if($result){

            if(mysqli_num_rows($result)==1){

                //fetch the data

                $row=mysqli_fetch_array($result);

                //retrive individual data

                $pupilname = $row['pupilname'];
    $adm_no = $row['adm_no'];
    $gender = $row['gender'];
    $grade = $row['grade'];
    $stream = $row['stream'];
    $dob = $row['dob'];
    $contact = $row['contact'];
    $parent_name = $row['parent_name'];
    $email = $row['email'];
            }

        }else{

            echo "Error executing query $sql".mysqli_error($link);
        }


    }else{
        echo "Id parameter was not found";
    }
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
        .btn{
          background-color: brown !important;
        }
        h1{
          text-align: center;
          border: 1px solid brown;
        }
        .center{
          padding:5px;
        }
        h5{
          text-align:center;
          text-decoration: underline;
          text-transform:uppercase;
          color:brown;
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
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Welcome,&#160;<?php session_start();
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
<form class="row g-3" action="pupiledit.php" method="post">
  <h1>EDIT PUPIL'S DATA</h1>
  <div class="col-md-4">
    <label1 class="form-label">Pupil Name</label1>
    <input type="text" name="pupilname" class="form-control" value="<?php echo $pupilname; ?>">
  </div>
  <div class="col-4">
    <label1 class="form-label">Admission Number</label1>
    <input type="text" name="adm_no" class="form-control"  placeholder="K987" value="<?php echo $adm_no; ?>">
  </div>
  <div class="col-md-4">
    <label1 for="inputState" class="form-label">Gender</label1>
    <select id="inputState" name="gender" class="form-select" value="<?php echo $gender; ?>">
      <option value="Male" name="gender" value="<?php echo $gender; ?>">Male</option>
      <option value="Female" name="gender" value="<?php echo $gender; ?>">Female</option>
    </select>
  </div>
  <div class="col-md-3" >
    <label1 class="form-label">Grade</label1>
    <select class="form-select" name="grade" value="<?php echo $grade; ?>"aria-label="Default select example">
  <option value="one"  name="grade" value="<?php echo $grade; ?>">one</option>
  <option value="two"  name="grade" value="<?php echo $grade; ?>">two</option>
  <option value="three"  name="grade" value="<?php echo $grade; ?>">three</option>
</select>
  </div>
  <div class="col-md-2">
    <label1 class="form-label">Stream</label1>
    <select class="form-select" name="stream" value="<?php echo $stream; ?>" aria-label="Default select example">
  <option value="East" name="stream" value="<?php echo $stream; ?>">East</option>
  <option value="West"  name="stream" value="<?php echo $stream; ?>">West</option>
  <option value="South" name="steam" value="<?php echo $stream; ?>">South</option>
</select>
  </div>
  <div class="col-md-3">
  <label1 class="form-label">D.O.B</label1><br>
  <input type="date" class="center" id="inputZip" name="dob" value="<?php echo $dob; ?>">
  </div>
  <h5>Contact info</h5>
  <div class="col-4">
    <label1 class="form-label">Contact Number</label1>
    <input type="text" name="contact" class="form-control" placeholder="07..." value="<?php echo $contact; ?>">
  </div>
  <div class="col-4">
    <label1 class="form-label">Parent Name</label1>
    <input type="text" name="parent_name" class="form-control" value="<?php echo $parent_name; ?>">
  </div>
  <div class="col-4">
  <label1 class="form-label">Email</label1>
    <input type="email" name="email" class="form-control" placeholder="kim@gmail.com" value="<?php echo $email; ?>">
  </div>
 
  <div class="col-12">
  <input type="hidden" name="id" value="<?php echo $id;?>"><br>
    <button name ="update" class="btn btn-primary">EDIT DATA</button>
  </div>
</form>
<div>
      

</body>

</html>
