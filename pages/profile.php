<?php
session_start();
require("connect.php");
if(isset($_SESSION['Regno']))
{ $reg=$_SESSION['Regno'];
 
    $sql= "SELECT * FROM `register_student` WHERE Regno ='$reg';";
    //echo $sql;
    $result= mysqli_query($connection, $sql);
    //echo $result;
    while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
    { $Name=$row['Name'];
      $Username=$row['Username'];
      $Email=$row['Email'];
      $Regno=$row['Regno'];
      $Program=$row['Program'];
      $Year=$row['Year'];
      $Branch=$row['Branch'];
      $Hostel=$row['Hostel'];
      $Mobile=$row['Mobile'];
  }
    
}
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

 
    <title>Profile</title>
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
                   <a class="navbar-brand" href="profile.php"><?php echo"welcome $Name"; ?></a>
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
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
            
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Personal Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <div class="table-responsive">
                                <table class="table table-striped table-bordered">                                         
                             
                                <tbody>
                                    <tr>
                                        <td><b>NAME</td>
                                        <td><?php echo $Name ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><b>USERNAME</td>
                                        <td><?php echo $Username ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><b>REGISTRATION NUMBER</td>
                                        <td><?php echo $Regno ?></td>
                                       
                                    </tr>
                                    <tr>
                                        <td><b>EMAIL</td>
                                        <td><?php echo $Email ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><b>PROGRAM</td>
                                        <td><?php echo $Program?></td>
                                      
                                    </tr>
                                    <tr>
                                        <td><b>YEAR</td>
                                        <td><?php echo $Year ?></td>
                                       
                                    </tr>
                                    <tr>
                                        <td><b>BRANCH</td>
                                        <td><?php echo $Branch ?></td>
                                       
                                    </tr>
                                    <tr>
                                        <td><b>HOSTEL</td>
                                        <td><?php echo $Hostel?></td>
                                       
                                    </tr>
                                    <tr>
                                        <td><b>MOBILE NUMBER</td>
                                        <td><?php echo $Mobile?></td>
                                        
                                    </tr>
                                    
                                </tbody>
                            </table>
                            </div>
         
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

   

</body>

</html>

?>