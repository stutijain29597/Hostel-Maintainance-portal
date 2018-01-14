<?php


session_start();
require("connect.php");
if(isset($_SESSION['Regno']))
{ $reg=$_SESSION['Regno'];
     $error="";
    if(isset($_POST['update']))
    {  $Name=$_POST['Name'];
       $Username=$_POST['Username'];
       $Email=$_POST['Email'];
       $Program=$_POST['Program'];
       $Year=$_POST['Year'];
       $Hostel=$_POST['Hostel'];
       $Mobile=$_POST['Mobile'];

         if(!preg_match('/^\d{10}$/',$Mobile))
           {  $error="Incorrect mobile number";
            
           }
           else
           {
             $sql="UPDATE register_student SET Name='$Name', Username='$Username' , Email='$Email' , Program='$Program' , Year='$Year' , Hostel='$Hostel' , Mobile='$Mobile' WHERE Regno='$reg' ";
             mysqli_query($connection,$sql);

             $sql="UPDATE ih SET Name='$Name', Hostel='$Hostel' , Mobile='$Mobile' WHERE Regno='$reg' ";
             mysqli_query($connection,$sql);
             

             $sql="UPDATE feedback SET Name='$Name',  Email='$Email' , Mobile='$Mobile' WHERE Regno='$reg' ";
             mysqli_query($connection,$sql);
             $error="Profile updated!!";

           }

    }






      $sqli= "SELECT * FROM `register_student` WHERE Regno ='$reg';";

       $resulti= mysqli_query($connection, $sqli);
   while ($row = mysqli_fetch_array($resulti)) {
      $Name=$row['Name'];
      $Username=$row['Username'];
      $Email=$row['Email'];
      $Program=$row['Program'];
      $Year=$row['Year'];
      $Hostel=$row['Hostel'];
      $Mobile=$row['Mobile'];
  }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>

  

    <title>Update </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <link href="../css/page.css" rel="stylesheet">
   

    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="profile.html"><?php echo"welcome $Name"; ?></a>
            </div>
              
            <ul class="nav navbar-top-links navbar-right">
               
            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                
                
                </li>
            </ul>

            <div class="navbar-inverse sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                         <li>
                            <a href="profile.php"><i class="fa fa-table fa-fw"></i> Profile</a>
                        </li>
                       
                       <li>
                            <a href="updateprofile.php"><i class="fa fa-table fa-fw"></i> Edit Profile</a>
                        </li>
                        
                        <li>
                            <a href="forms.php"><i class="fa fa-edit fa-fw"></i> Complain form</a>
                        </li>
                       <li>
                            <a href="status.php"><i class="fa fa-edit fa-fw"></i>Status of complain</a>
                        </li>
                        <li>
                            <a href="track.php"><i class="fa fa-edit fa-fw"></i>Track complains</a>
                        </li>
                        <li>
                            <a href="contact.php"><i class="fa fa-table fa-fw"></i>Contact Us</a>
                        </li>
                        <li>
                            <a href="feedback.php"><i class="fa fa-edit fa-fw"></i>Feedback</a>
                        </li>

                        
                        
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Profile</h1>
                </div>
                </div>

             <div class="panel-body">
           <div id="error" class="alert alert-success" role="alert"><?php echo $error ?></div>

                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        <form class="form" action="updateprofile.php" method="post" enctype="multipart/form-data" autocomplete="off">

                                           <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="Name" class="form-control" value="<?php echo $Name;?>">
                                        </div>
                                        
                                          <div class="form-group">
                                            <label>Userame</label>
                                            <input type="text" name="Username" class="form-control" value="<?php echo $Username;?>">
                                        </div>
                                        
                                          <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="Email" class="form-control" value="<?php echo $Email;?>">
                                        </div>
                                        
                                          <div class="form-group">
                                            <label>Program</label>
                                            <input type="text" name="Program" class="form-control" value="<?php echo $Program;?>">
                                        </div>
                                        
                                          <div class="form-group">
                                            <label>Year</label>
                                            <input type="text" name="Year" class="form-control" value="<?php echo $Year;?>">
                                        </div>
                                        
                                          <div class="form-group">
                                            <label>Hostel</label>
                                            <input type="text" name="Hostel" class="form-control" value="<?php echo $Hostel;?>">
                                        </div>
                                        
                                          <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="number" name="Mobile" class="form-control" value="<?php echo $Mobile;?>">
                                        </div>
                                        
                                        <input type="submit" value="update" name="update" class="btn " />
                                        
                                    </form>
                                </div>
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    
     

</body>

</html>
