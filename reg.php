<?php
session_start();
if(isset($_SESSION['user']) || isset($_SESSION['admin']) ){
$now=date("Y-m-d");
require('config_db.php');
  /*  $firstName=null;
    $lastName=null;
    $dob=null;  
    $parentName=null;*/
if (isset($_POST['submit'])) {
	$firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $parentName=$_POST['parentName'];
  //  echo $firstName;

    $sql="INSERT INTO patients(firstName,lastName,date_of_birth,gender,parentsName) VALUES('$firstName','$lastName','$dob','$gender','$parentName')";
    $result=mysqli_query($con,$sql);
    if ($result) {
        $id = mysqli_insert_id($con);
        $id = sprintf('%07d', $id);
     $_SESSION['id']=$id;
        ?>
<script>
             alert("Patient Registration Done"); 
             window.location="http://localhost/nkoa/complete_reg.php";
         </script>   
        <?php       }

    else{
    //echo "Oops! Patients Registration Failed ".mysqli_error($con);
    die(header("Location:errorpage.php"));
     }

}

}
else{
  header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nkoa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="register_patients.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="images/ico.ico" />
</head>
<body id>
<div class="container">
    <div class="jumbotron">
        <h1 id="title">Nyanza Kenya Ostomy Association</h1>
        <h4 id="h4">Patients Information Management System v 1.0</h4>
        <img src="images/mylogo.jpg" id="logo">
                <div id="tools">
         <a href="home.php"><span class="glyphicon glyphicon-home" id="home" data-toggle="tooltip" title="Home"></span></a>
         <div class="dropdown">
    <span class="glyphicon glyphicon-user dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></span>
    <ul class="dropdown-menu">
      <li><a href="user-profile.php">My Profile</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
  </div>
         </div>
    </div>

<div class="well" id="login">
<h2>Patient Registration</h2>
  <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="form-group">
      <label for="user">First Name*</label>
      <input type="text" class="form-control" name="firstName" pattern="[a-zA-Z]+" title="Name Contains Only letters" required>
    </div>
    <div class="form-group">
      <label for="pwd">Last Name*</label>
      <input type="text" class="form-control" name="lastName" pattern="[a-zA-Z]+" title="Name Contains Only letters" required>
    </div>
        <div class="form-group">
      <label for="user">Date of Birth*</label>
      <input type="date" class="form-control" name="dob" max="<?php echo $now ?>" required>
    </div>
<div class="form-group">
  <label for="sel1">Gender*</label>
  <select class="form-control" name="gender" required>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select></br>
          <div class="form-group">
      <label for="user">Parents Name(If child)*</label>
      <input type="text" class="form-control" name="parentName" pattern="[a-zA-Z ]+" title="Name Contains Only Letters" required>
    </div>
</div>
  <input type="submit" class="btn btn-info" id="submit" name="submit" value="Submit" >
  </form>
</div>
<style type="text/css">
    body{
 
   padding: 0px;
   margin: 0px;
 }
#login{
  width: 77%;
}

 </style>
<script type="text/javascript">

</script>
</body>
</html>
