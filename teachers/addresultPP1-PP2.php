<?php
require_once "teacherconfig.php";
if(isset($_POST["id"]) and !empty($_POST["id"])) {

    //get hidden input
    $id=$_POST["id"];
    $term = $_POST['term'];
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $stream = $_POST['stream'];
    $english = $_POST['english'];
    $english = $_REQUEST['english'];
    $maths = $_POST['maths'];
    $maths = $_REQUEST['maths'];
    $environmental = $_POST['environmental'];
    $environmental = $_REQUEST['environmental'];
    $psychomotor = $_POST['psychomotor'];
    $psychomotor = $_REQUEST['psychomotor'];
    $creative = $_POST['creative'];
    $creative = $_REQUEST['creative'];
    $music = $_POST['music'];
    $music = $_REQUEST['music'];
    $religion = $_POST['religion'];
    $religion = $_REQUEST['religion'];


    //run the update query
    $sql = "INSERT INTO `result1-2`(`term`, `name`, `grade`, `stream`, `english`, `maths`, `environmental`, `psychomotor`, `creative`, `music`, `religion`, `total`)
    VALUES ('$term','$name','$grade','$stream','$english','$maths','$environmental','$psychomotor','$creative,'$music','$religion','$total')";
    $result = mysqli_query($link,$sql);
    if($result){
        echo "Record added successfully";
        header("location: addresultPP1-PP2.php");
        
    }else{
        echo "could not add";
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
                $adm_no = $row['adm_no'];
                $name = $row['name'];
                $grade = $row['grade'];
                $stream = $row['stream'];
    
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
table,th,td,tr{
        border: 0.5px solid black;
        width: 100%;
        table-layout: fixed;
        text-align: center;
       
    }
    .fa-user-graduate{
      color: black !important;
    }
    .fa-user-graduate:hover{
      color: black !important;
    }
    .fa-graduation-cap:hover{
      color: black !important;
    }
    input{
      text-align: center;
      width: 100%;
    }
    .btn{
      background-color: brown;
    }
    .btn:hover{
      background-color: brown !important;
    }
    .row{
      text-transform:uppercase;
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
      <div class="container overflow-hidden">
        <form action="addresultPP1-PP2.php" method="post">
    <div class="col-12">
    <table class="table caption-top">
      <div class="p-3 border bg-light"><i class="fas fa-graduation-cap">&#160;PP1 - PP2</i></div>
      <tbody>
      <tr>
      <th scope="row">PUPIL ID</th>
      <td><input type="text" name="id" value="<?php echo $id; ?>"></td>
    </tr>
    <tr>
      <th scope="row">PUPIL NAME</th>
      <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
    </tr>
    <tr>
      <th scope="row">PUPIL GRADE</th>
      <td><input type="text" name="grade" value="<?php echo $grade; ?>"></td>
    </tr>
    <tr>
      <th scope="row">PUPIL STREAM</th>
      <td><input type="text" name="stream" value="<?php echo $stream; ?>"></td>
    </tr>
    <tr>
      <th scope="row">English</th>
      <td><input type="text" name="english"></td>
    </tr>
    <tr>
      <th scope="row">Maths</th>
      <td><input type="text" name="maths"></td>
    </tr>
    <tr>
      <th scope="row">Environmental</th>
      <td><input type="text" name="environmental"></td>
    </tr>
    <tr>
      <th scope="row">Psychomotor</th>
      <td><input type="text" name="psychomotor"></td>
    </tr>
    <tr>
      <th scope="row">Creative</th>
      <td><input type="text" name="creative"></td>
    </tr>
    <tr>
      <th scope="row">Music</th>
      <td><input type="text" name="music"></td>
    </tr>
    <tr>
      <th scope="row">Religion</th>
      <td><input type="text" name="religion"></td>
    </tr>
    <tr>
      <th colspan="2"><input type="hidden" name="id" value="<?php echo $id;?>">
  <button Value="SEND" name="submit" type="submit"><?php echo "<a href='resultPP1-PP2.php?id=".$row['id']."'>";?></button></th>
</tr>
  </tbody>
</table>
    </div>
  </div>
</form>

</div>

</body>

</html>
