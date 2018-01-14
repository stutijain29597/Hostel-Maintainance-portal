<?php


session_start();
require("connect.php");
if(isset($_SESSION['Regno']))
{ $reg=$_SESSION['Regno'];
     $error="";
      $sqli= "SELECT * FROM `register_student` WHERE Regno ='$reg';";

       $resulti= mysqli_query($connection, $sqli);
   while ($row = mysqli_fetch_array($resulti)) {
      $Name=$row['Name'];
      $Regno=$reg;
      $Email=$row['Email'];
      $Mobile=$row['Mobile'];
  }
}
   if(isset($_POST['submit'])&&isset($_POST['Feedback']))
   {
     $Feedback=$_POST['Feedback'];
     
     $query = "INSERT INTO feedback(Name,Regno,Feedback,Email,Mobile) VALUES ('$Name','$Regno','$Feedback','$Email','$Mobile');";
           // echo $query;
            $result = mysqli_query($connection, $query);
            //echo $result;
            if($result){
            $error="Complaint done Successfully!!!!!";
            
              }      
       else
       $error="Error!!Try again! or such comlain already done";
}
?>






<!DOCTYPE html>
<html lang="en">

<head>

  

    <title>Feedback</title>

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
                    <h1 class="page-header">Feedback</h1>
                </div>
            </div>
                            <div id="error" class="alert alert-success" role="alert"><?php echo $error ?></div>

             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Complain
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        <form class="form" action="feedback.php" method="post" enctype="multipart/form-data" autocomplete="off">

                                           <div class="form-group">
                                            <label>Write your feedback</label>
                                            <textarea rows="10" cols="20" name="Feedback" class="form-control" rows="3" required/></textarea>
                                        </div>

                                        <input type="submit" value="submit" name="submit" class="btn " />
                                        <button type="reset" class="btn">Reset </button>
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

           
     

</body>

</html>
