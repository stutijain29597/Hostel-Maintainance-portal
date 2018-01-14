<?php
require("connect.php");
  function getuserdata($Regno){
  	$array= array();
  	$sql= " SELECT * FROM `register_student` WHERE Regno= '$Regno'";
  	$result=mysqli_query($connection,$sql);
  	while($r=mysql_fetch_assoc($result))
  	{
      array['Name']=$r['Name'];
      array['Username']=$r['Username'];
      array['Email']=$r['Email'];
      array['Regno']=$r['Regno'];
      array['Program']=$r['Program'];
      array['Year']=$r['Year'];
      array['Branch']=$r['Branch'];
      array['Hostel']=$r['Hostel'];
      array['Mobile']=$r['Mobile'];

  	}
  	return $array;

  }

  /*function getId($UserName)
  { 
      	$sql= " SELECT `Regno` FROM `register_student` WHERE Username= '$Username'";
      	$result=mysqli_query($connection,$sql);
        while($r=mysql_fetch_assoc($result)){
        	return $row['Regno'];
        }


  }*/
  ?>