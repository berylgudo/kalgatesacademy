<?php
require_once "teacherconfig.php";
if(isset($_POST["id"]) and !empty($_POST["id"])) {

    //get hidden input
    $id=$_POST["id"];
    $term = $_POST['term'];
    $adm_no = $_POST['adm_no'];
    $pupilname = $_POST['pupilname'];
    $grade = $_POST['grade'];
    $stream = $_POST['stream'];
    $english = $_POST['english'];
    $english = $_REQUEST['english'];
    $maths = $_POST['maths'];
    $maths = $_REQUEST['maths'];
    $science = $_POST['science'];
    $science = $_REQUEST['science'];
    $artcraft = $_POST['artcraft'];
    $artcraft = $_REQUEST['artcraft'];
    $kiswahili = $_POST['kiswahili'];
    $kiswahili = $_REQUEST['kiswahili'];
    $hscience = $_POST['hscience'];
    $hscience = $_REQUEST['hscience'];
    $music = $_POST['music'];
    $music = $_REQUEST['music'];
    $religion = $_POST['religion'];
    $religion = $_REQUEST['religion'];
    $agriculture = $_POST['agriculture'];
    $agriculture = $_REQUEST['agriculture'];
    $socialstudies = $_POST['socialstudies'];
    $socialstudies = $_REQUEST['socialstudies'];

    $total = $_POST['total'];
    $total=$_REQUEST['total'];

$total=$english+$maths+$science+$artcraft+$kiswahili+$hscience+$music+$religion+$agriculture+$socialstudies;

    //run the update query
    $sql = "INSERT INTO `result`(`term`, `adm_no`, `pupilname`, `grade`,`stream`,`english`, `maths`, `science`, `artcraft`, `kiswahili`, `hscience`, `music`, `religion`, `agriculture`, `socialstudies`, `total`)
    VALUES ('$term','$adm_no','$pupilname','$grade','$stream','$english','$maths','$science','$artcraft','$kiswahili','$hscience','$music','$religion','$agriculture','$socialstudies' ,'$total')";
    $result = mysqli_query($link,$sql);
    if($result){
        echo "Record added successfully";
        header("location: viewpupil.php");
        
    }else{
        echo "could not update $sql".mysqli_error($link);
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
                $pupilname = $row['pupilname'];
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
    .form-select{
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
        <form action="addresultgrd4-grd6.php" method="post">
  <div class="row gx-5">
    <div class="col-12">
     <table class="table caption-top">
     <div class="p-3 border bg-light"><i class="fas fa-user-graduate">&#160;GRD4 - GRD6</i></div>
  <tbody>
  <tr>
      <th scope="row">TERM</th>
      <td><div class="col-md-4">
    <select class="form-select" name="term" aria-label="Default select example">
  <option selected >Select Term</option>
  <option value="one" name="term">one</option>
  <option value="two"  name="term">two</option>
  <option value="three" name="term">three</option>
</select>
  </div></td>
    </tr>
    <tr>
      <th scope="row">ADMISSION NUMBER</th>
      <td><input type="text" name="adm_no" value="<?php echo $adm_no; ?>"></td>
    </tr>
    <tr>
      <th scope="row">PUPIL NAME</th>
      <td><input type="text" name="pupilname" value="<?php echo $pupilname; ?>"></td>
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
      <th scope="row">Science and Technology</th>
      <td><input type="text" name="science"></td>
    </tr>
    <tr>
      <th scope="row">Art and Craft</th>
      <td><input type="text" name="artcraft"></td>
    </tr>
    <tr>
      <th scope="row">Kiswahili</th>
      <td><input type="text" name="kiswahili"></td>
    </tr>
    <tr>
      <th scope="row">H/Science</th>
      <td><input type="text" name="hscience"></td>
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
      <th scope="row">Agriculture</th>
      <td><input type="text" name="agriculture"></td>
    </tr>
    <tr>
      <th scope="row">Social Studies</th>
      <td><input type="text" name="socialstudies"></td>
    </tr>
    <tr>
      <th colspan="2"><input type="hidden" name="id" value="<?php echo $id;?>">
  <button class="btn btn-primary" name="submit" type="submit">SEND</button></th>
</tr>
  </tbody>
</table>
                      
     
    </div>
    </form>

</div>

</body>

</html>
