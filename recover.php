<?php
  session_start();
  require('connect.php');
    $error="";
       $fmsg="";

  if (isset($_POST['Username']) && isset($_POST['Email'])){
    $Username=$_POST['Username'];
    $Email=$_POST['Email'];
    $sql="SELECT * FROM `register_student` WHERE Username='$Username' AND Email='$Email'";
    $result=mysqli_query($connection, $sql);
      //echo $sql;
         $count=mysqli_num_rows($result);
         //echo $count;
        if($count==1)
        {
          $pass=rand();
          echo $pass;
          $pass=md5($pass);
         // $pass=substr($pass,0,10);
          $sq="UPDATE `register_student` SET Password='$pass',Confirmpassword='$pass' WHERE Username='$Username' AND Email='$Email'";
         mysqli_query($connection,$sq);
         
          $query=mysqli_query($connection,"SELECT * FROM `register_student` WHERE Username='$Username' AND Password='$pass' ");

          $num=mysqli_num_rows($query);
          echo $num;
          if($num==1)
          { 
            $webmaster="maintainance.com";
            $headers="From: stuti<$webmaster>";
            $subject="Your new password";
            $msg="Hello, your password has been reset,Your new password is below";
            $msg.="Password: $pass\n";

            if(mail($Email, $subject, $msg , $headers)){
               $fmsg="Your password has been reset.An email has been sent with your new password.";
            }
            else
              $fmsg="An error occoured and your email containing new password is not sent";


          }
          else
            $fmsg="An error has occoured";
        }
        else
        {
          $fmsg="Invalid Username or Email-Id";
        }
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="signup.css" type="text/css"> 

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top topnav" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav ">
                  <li>
                     <a href="index.html"> HOME</a>
                  </li>
                    <li>
                        <a href="#about">ABOUT</a>
                    </li>
                    <li>
                        <a href="http://www.mnnit.ac.in/">MNNIT HOME</a>
                    </li>
                    <li>
                        <a href="#contact">CONTACT</a>
                    </li>
                </ul>
                <form class="navbar-form navbar-right">
          <div class="input-group">
          <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-btn">
             <button class="btn btn-default" type="submit">
               <i class="glyphicon glyphicon-search"></i>
            </button>
           </div>
         </div>
         </form>
            </div>
          
             
        </div>
        
    </nav>

  <div id="error"><?php echo $fmsg ?></div>
<div class="body-content">
  <div class="module">
    <form class="form" action="recover.php" method="post" enctype="multipart/form-data" autocomplete="off">
       <input type="text" placeholder="User Name" name="Username" required />
       <input type="email" placeholder="Email" name="Email" required />
       <input type="submit" value="Reset Password" name="resetpass" class="btn btn-block btn-default" />
    </form>
  </div>
 </div> 


