<?php
session_start();
require_once "financeconfig.php";
if(isset($_POST["id"]) and !empty($_POST["id"])) {

    //get hidden input
    $id=$_POST["id"];
    $pupilname = $_POST['pupilname'];
    $adm_no = $_POST['adm_no'];
    $grade = $_POST['grade'];
    $stream = $_POST['stream'];
    $date = $_POST['date'];
    // $total_billed = $_POST['total_billed'];
    // $amount_paid = $_POST['amount_paid'];
    // $balance=$_POST['balance'];

   $total_billed=$_REQUEST['total_billed'];
  $amount_paid=$_REQUEST['amount_paid'];
//  $balance=$_REQUEST['balance'];

$sql = "SELECT total_billed,balance FROM `pupil` WHERE id='$id'";
$result = mysqli_query($link,$sql);
$sr = mysqli_fetch_array($result);
$totalfee = $sr['total_billed'];
if($sr['balance']>0){
  $sql = "INSERT INTO `fee`(`id`, `pupilname`, `adm_no`, `grade`, `stream`, `date`, `amount_paid`) 
  VALUES ('$id','$pupilname','$adm_no','$grade','$stream','$date','$amount_paid')";
  mysqli_query($link,$sql);
  $sql1 = "INSERT INTO `feebackup`(`id`, `pupilname`, `adm_no`, `grade`, `stream`, `date`, `amount_paid`) 
  VALUES ('$id','$pupilname','$adm_no','$grade','$stream','$date','$amount_paid')";
  mysqli_query($link,$sql1);
  $sql = "SELECT sum(`amount_paid`) as totalpaid FROM `fee` WHERE id = $id";
  $tpq = mysqli_query($link,$sql);
  $tpr = mysqli_fetch_array($tpq);
  $totalpaid = $tpr['totalpaid'];
  $tbalance = ($totalfee) - $totalpaid;

  $sql = "UPDATE `pupil` SET `balance`='$tbalance' WHERE id='$id'";
  if(mysqli_query($link,$sql)){
    echo "<div class='alert alert-success' role='alert'>Fee Added successfully</div>";
    
}else{
    echo "<div class='alert alert-success' role='alert'>Fee Could not be Added</div>";
}
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
    $grade = $row['grade'];
    $stream = $row['stream'];
    $total_billed = $row['total_billed'];
    
    
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
    <title>FINANCE HOME</title>

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
h5{
    font-size: 20px;
    font-weight: bold;
    text-align: center;
   padding: 17px;
   color: white;
}
label{
    text-align: center;
   color: black;
   margin-top: 20px;
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
            background-color: brown;
            margin-top: 53px;
            padding: 20px;
            margin-left:205px;
            color:black;
             
            
        }
        .btn{
      background-color:brown !important;
      margin:10px;
      margin-left: 450px;
      padding: 10px;
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
form{
            background-color: white;
            padding-left: 40px;
            margin-top: 10px;
            
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
  <h5>Kalgates <span>Portal</span></h5> 
  <div class="list">
  <a href="feepayment.php"><div class="item"><i class="fas fa-money-bill-alt">&#160 Fee Payment</i></div></a>
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
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Welcome,&#160;<?php 
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
<form class="row g-3" action="payfee.php" method="post" enctype="multipart/form-data">
<div class="col-md-3">
<label class="form-label">ID</label><br>
    <input type="text"  name="id" value="<?php echo $id; ?>" readonly>
  </div> 
  <div class="col-md-3">
    <label class="form-label">Pupil Name:</label><br>
         <input type="text" name="pupilname" value="<?php echo $pupilname; ?>" class="form-control" readonly>
    </div>
  <div class="col-md-3">
    <label class="form-label">Admission Number:</label>
         <input type="text" name="adm_no" value="<?php echo $adm_no; ?>" class="form-control" readonly>
    </div>
    <div class="col-md-3">
    <label class="form-label">Grade:</label><br>
         <input type="text" name="grade" value="<?php echo $grade; ?>" class="form-control" readonly>
    </div>
    <div class="col-md-3">
    <label class="form-label">Stream:</label><br>
         <input type="text" name="stream" value="<?php echo $stream; ?>" class="form-control" readonly>
    </div>
    <div class="col-md-3">
    <label class="form-label">Date:</label><br>
         <input type="date" name="date" required class="form-control">
    </div>
<div class="col-md-3">
    <label class="form-label">Total Billed:</label>
    <input type="text" name="total_billed" value="<?php echo $total_billed; ?>" readonly class="form-control">
  </div>
  <div class="col-md-3">
    <label class="form-label">Amount Paid:</label>
    <input type="number" name="amount_paid" class="form-control">
  </div>
  <div class="col-md-12">
  <input type="hidden" name="id" value="<?php echo $id;?>">
  <button class="btn btn-primary" name="submit" type="submit">ADD FEE</button>
</div>
<div>

</body>

</html>
<?php


?>
