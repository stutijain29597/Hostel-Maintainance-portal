<?php 

session_start();
require("connect.php");
if(isset($_SESSION['Regno']))
{ $reg=$_SESSION['Regno'];
 
    $sql= "SELECT * FROM `register_student` WHERE Regno ='$reg';";

    $resulti= mysqli_query($connection, $sql);
  
    $p=0;
    if (mysqli_num_rows($resulti)>=1) {
    $complains = array();
     $Name;
     $m;
     $h;
    while ($row = mysqli_fetch_array($resulti)) {
      $Name=$row['Name'];
      $m=$row['Mobile'];
      $h=$row['Hostel'];


      }
  }
}
   
     $error="";
       if (isset($_POST['Complain']) ){
        $Complain=mysql_real_escape_string($_POST['Complain']);
        $Type = mysql_real_escape_string($_POST['Type']);
        $Type2 = mysql_real_escape_string($_POST['Type2']);
        $Availability=mysql_real_escape_string($_POST['Availability']);
        
        $Hostel=$h;
        $Roomno=mysql_real_escape_string($_POST['Roomno']);
        $Regno=$reg;
        $Mobile=$m;;
        $date=date("F, d Y");
        //echo "HELLO";
      

            $query = "INSERT INTO ih (Complain,Type,Type2,Availability,Name,Hostel,Roomno,Regno,Mobile,Datem) VALUES ('$Complain','$Type','$Type2','$Availability','$Name','$Hostel','$Roomno','$Regno','$Mobile','$date');";
           // echo $query;
            $result = mysqli_query($connection, $query);
            //echo $result;
            if($result){
            $error="Complaint done Successfully!!!!!";
            
              }      
       else
       $error="Error!!Try again! or such comlain already done";
      //else
      //echo "such user already registered";

//echo $error;
}?>




<!DOCTYPE html>
<html lang="en">

<head>



      <title>Complain Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    
    <link href="../css/page.css" rel="stylesheet">

    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><?php echo"welcome $Name"; ?></a>
            </div>
        

            <ul class="nav navbar-top-links navbar-right">
               
            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                
                
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
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
                    <h1 class="page-header">Complain Form</h1>
                </div>
            </div>

           <div id="error" class="alert alert-danger" role="alert"><?php echo $error ?></div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Complain
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        <form class="form" action="forms.php" method="post" enctype="multipart/form-data" autocomplete="off">

                                           <div class="form-group">
                                            <label>Enter your complain</label>
                                            <textarea rows="8" cols="20" name="Complain" class="form-control" rows="3" required/></textarea>
                                        </div>
                                        <div class="form-group">
                                         <label for="sel1">Category of complain</label>
                                         <select name="Type"  class="form-control" id="sel1">
                                         <option>Electrician</option>
                                         <option>Carpenter</option>
                                         <option>Sanitary</option>
                                         <option>Water Coolers</option>
                                         <option>Lan related problem</option>
                                         <option>Cleanliness</option>
                                         <option>Mess Food</option>
                                         <option>Others</option>
                                         </select>
                                        </div>
                                         <div class="form-group">
                                         <label for="sel2">Type of complain</label>
                                         <select name="Type2" class="form-control" id="sel2">
                                         <option>Replace</option>
                                         <option>Repair</option>
                                         <option>Others</option>
                                         </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Availability</label>
                                            <input type="text" name="Availability" class="form-control" placeholder="Enter day and time">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Room Number</label>
                                            <input type="text" name="Roomno" class="form-control" placeholder="Enter your room no.">
                                        </div>
                                      
                                       
                                        <input type="submit" value="Complain" name="register" class="btn " />
                                        <button type="reset" class="btn">Reset</button>
                                                 <input type="button" class="btn " value="Print" onclick="window.print()" />

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


