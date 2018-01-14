<?php


session_start();
require("connect.php");
if(isset($_SESSION['Regno']))
{
  if(isset($_POST['resolved']))
                                         {  $com=$_POST['Complain'];
                                           // echo $com;
                                            $d ="done";

                                             $sql="UPDATE `ih` SET Status='$d' WHERE Complain='$com'";
                                             mysqli_query($connection,$sql);
                                             //$c=mysqli_num_rows($r);
                                             
                                             }
 $reg=$_SESSION['Regno'];
 
    $sql= "SELECT * FROM `ih` WHERE Regno ='$reg';";
      $sqli= "SELECT * FROM `register_student` WHERE Regno ='$reg';";

    $result= mysqli_query($connection, $sql);
       $resulti= mysqli_query($connection, $sqli);
   while ($row = mysqli_fetch_array($resulti)) {
      $Name=$row['Name'];
    $p=0;
    if (mysqli_num_rows($result)>=1) {
    $complains = array();
 }
    while ($row = mysqli_fetch_array($result)) {
     
      $multid_array[]=$row;
      $p++;
  }


  

}

}
                                       // for($l=0;$l<$p;$l++)
                                      
                                        






?>
<!DOCTYPE html>
<html lang="en">

<head>

 

      <title>Status of complaints</title>
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
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Status</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Status of complaints
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered"> 
                                <thead>
                                    <tr>
                                        <th>COMPLAINS</th>
                                        <th>CATEGORY</th>
                                        <th>STATUS</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                for($l=0;$l<$p;$l++)
                                   {   echo "<tr>";
                                       echo "<td>".$multid_array[$l][0]."</td>";
                                       echo "<td>".$multid_array[$l][1]."</td>";
                                       echo "<td>".$multid_array[$l][4]?>
                                      
                                      <?php
                                       "</td>";
                                       echo "</tr>";
                                       
                                    
                                }
                                   
                                ?>
                                    

                                     <form action="status.php" method="post">
                                       <input type="text" placeholder="compalin which is resolved        " name="Complain" >
                                       <input type="submit" value="Resolved" name="resolved" class="btn-success" />  
                                       <br>
                                       </form>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
           </div>
           </div>
           
</body>

</html>
