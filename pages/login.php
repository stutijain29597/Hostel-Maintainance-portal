<?php
      session_start();
      require('connect.php');
       $error="";
       $fmsg="";

        if(isset($_POST)& !empty($_POST)){
        $Regno=mysql_real_escape_string($_POST['Regno']);
        $Username=mysql_real_escape_string($_POST['Username']);
        $Password = md5($_POST['Password']);
        $sql="SELECT * FROM `register_student` WHERE Regno='$Regno' AND Username='$Username' AND Password='$Password'";
        $result=mysqli_query($connection, $sql);
      
         $count=mysqli_num_rows($result);
        if($count==1)
        {
          $_SESSION['Regno']=$Regno;
          header('location: pro.html'); 
        }
        else
        {
          $fmsg="Invalid Registration Number,Username or Password";

        }
      
     }
     
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Maintainance portal</title>

 
    <link href="css/bootstrap.min.css" rel="stylesheet">

   
    <link href="css/mainpage.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    
    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>
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
          
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
   
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>MAINTAINANCE PORTAL</h1>
                        <h3>Motilal Nehru National Institute of Technology</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline">
                            <li>
                               <a href="signupstudent.php" class="btn btn-default btn-lg btn-responsive" role="button">Sign Up</a>
                            </li>
                            <li>
                                <button  class="btn btn-default btn-lg btn-responsive" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" >Login</button>

                                <div id="id01" class="modal">
  
                                 <form class="modal-content animate" method="post" action="login.php">
                                 <div class="imgcontainer">
                                 <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                                </div>

                                <div class="container">
                                
                                <input type="number" placeholder="Enter Registration Number" name="Regno" required>
                              
                              <input type="text" placeholder="Enter Username" name="Username" required>

                              
                               <input type="password" placeholder="Enter Password" name="Password" required>
        
                              <button class="btn btn-success btn-lg btn-responsive" type="submit" name="login">Login</button>

                              <input type="checkbox" name="keep" checked="checked"><span class="psws">Keep me logged in<br/></span>
                               </div>

                             <div class="containers" style="background-color:#f1f1f1">
                             <button class="btn btn-danger btn-lg btn-responsive" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                             <span class="psw">Forgot <a href="#">password?</a></span>
                            </div>
                           </form>
                           </div>

                           <script type="text/javascript">
// Get the modal
                           var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
                            window.onclick = function(event) {
                            if (event.target == modal) {
                            modal.style.display = "none";
                                                       }
                                                             }
                           </script>




                            </li>
                            
                        </ul>
                         
                        <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"><?php echo $fmsg; ?></div>
                        <?php   } ?>

                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>

  
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Hostels</h2>
                    <p class="lead">MNNIT, Allahabad is a residential Institute that accommodate about more than 4500 students in different hostels. There are seven boys hostels and three girls hostel to accommodate the assets of the Institute in the most comfortable and conducive manner.</p>
                </div>
                <div class="col-sm-5">
                    <img class="img-responsive" src="img/tilak.jpg" alt="">
                </div>
               
                <div class="col-sm-3">
                <div class="mq">
               
    
      <center><font size="+1"><b style="color:#191B7E"><div style="background-color:#969BFB" > Notice Board</div><br></b></font></center>
        <marquee direction="up"  height="300px" onMouseOver="this.stop();" onMouseOut="this.start();">
      <center><a href="" style="text-decoration:none"><font size="+1"><b>Campus Drive</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>News</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Sports Fest</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Placement List</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Weekend Events</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Summer Vacation</b></font></a></center><br>
    </marquee>
     
     </div>
     </div>
 </div>
            </div>
            </div>
            
      

    




    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 step-container">
                  <div class="step" data-step-index="1">
                   <div class="step-card"></div>
                     <img src="img/application.png" alt="">
                     <p class="title"> Submit a maintainance request</p>
                     <p class="subtitle">This portal allows you to submit maintainance request, day or night.</p>
                       </div>
                       </div>
                       <div class="col-sm-4 step-container">
                   <div class="step" data-step-index="2">
                   <div class="step-card"></div>
                    <img src="img/invite.png" alt="">
                     <p class="title"> Communicate with admin</p>
                     <p class="subtitle">This portal allows you to comunicate to the person who will rectify the problem.</p>
                       </div>
                       </div>
                       <div class="col-sm-4 step-container">
                   <div class="step" data-step-index="3">
                   <div class="step-card"></div>
                     <img src="img/application-complete.png" alt="">
                     <p class="title"> Track the request to completion</p>
                     <p class="subtitle">This portal allows you to make sure that your request gets completed timely.</p>
                     </div>
                     </div>
                     
               </div>
            </div>
        </div>
    </div>
   

 









    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">MNNIT home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Your Company 2017. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

  

</body>

</html>
