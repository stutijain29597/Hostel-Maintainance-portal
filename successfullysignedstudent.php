<?php

   require('connect.php');
     $error="";
       if (isset($_POST['Username']) && isset($_POST['Password'])){
        $Username=mysql_real_escape_string($_POST['Username']);
        $Name = mysql_real_escape_string($_POST['Name']);
        $Email = mysql_real_escape_string($_POST['Email']);
        $Password = $_POST['Password'];
        $Confirmpassword=$_POST['Confirmpassword'];
        $Regno=mysql_real_escape_string($_POST['Regno']);
        $Program=mysql_real_escape_string($_POST['Program']);
        $Year=mysql_real_escape_string($_POST['Year']); 
        $Branch=mysql_real_escape_string($_POST['Branch']);
        $Hostel=mysql_real_escape_string($_POST['Hostel']);
        $Mobile=mysql_real_escape_string($_POST['Mobile']);
        $date=date("F, d Y");
        if(strlen($Password)<8)
            {$error="Password must be greater than 8 characters";
             
         }
         else if(!preg_match('/^\d{10}$/',$Mobile))
           {  $error="Incorrect mobile number";
            
         }
        else if(strlen($Regno)!=8)
           { $error="Incorrect Registration number";
            
         }
        else if($Password!==$Confirmpassword)
          {  $error="Password does not match";
            
         }
        else
            { $Password=md5($Password);
                $Confirmpassword=md5($Confirmpassword);

            $query = "INSERT INTO register_student VALUES ('$Name','$Username','$Email','$Password','$Confirmpassword','$Regno','$Program','$Year','$Branch','$Hostel','$Mobile','$date');";

            $result = mysqli_query($connection, $query);
            if($result){
            $error="Registered Successfully!!!!!";
            
}      
       else
       $error="This Registration number is already registered";
      //else
      //echo "such user already registered";
}
}?>


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
                
            </div>
          
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


  <div id="error"><?php echo $error ?></div>
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="successfullysignedstudent.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <input type="text" placeholder="Name" name="Name" required />
      <input type="text" placeholder="User Name" name="Username" required />
      <input type="email" placeholder="Email" name="Email" required />
      <input type="password" placeholder="Password" name="Password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="Confirmpassword" autocomplete="new-password" required />
      <input type="number" name="Regno" placeholder="Regno" required/>
      <select name="Program" placeholder="Program">
      <option>B.TECH</option>
      <option>M.TECH</option>
      <option>PHD</option>
      <option>MBA</option>
      </select>
      <select name="Year" placeholder="Year">
      <option>1st year</option>
      <option>2nd year</option>
      <option>3rd year</option>
      <option>final year</option>
      </select>
      <select name="Branch" placeholder="Branch">
      <option>Computer Science and Engineering</option>
      <option>Information Technology</option>
      <option>Electronics and Communication Engineering</option>
      <option>Electrical Engineering</option>
      <option>Chemical Engineering</option>
      <option>Civil Engineering</option>
      <option>Biotechnology</option>
      <option>Mechanical Engineering</option>
      <option>Applied Mechanics</option>
       <option>others</option>
      </select>
      <select name="Hostel" placeholder="Hostel">
      <option>K.N.G.H</option>
      <option>S.N.G.H</option>
      <option>IH</option>
      </select>
      <input type="number" name="Mobile" placeholder="Mobile number" required/>
      <input type="checkbox" checked="checked"> remember me 


      <input type="submit" value="Register" name="register" class="btn btn-block btn-default" />
    </form>
  </div>
</div>



