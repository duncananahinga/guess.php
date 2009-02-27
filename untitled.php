<html>
<head> <title>   </title> </head>

<body>
	<p>blah blah</p>
<?php

$con=mysql_connect("localhost","root","");

// if (!$con){
// 	
// 	die ('could not connect: ' . mysql_error());
// }
// 	
// if (mysql_query("CREATE DATABASE blahblah_db",$con))
//   {
//   echo "Database created";
//   }
// else
//   {
//   echo "Error creating database: " . mysql_error();
//   }

	mysql_select_db("blahblah_db", $con);
	$sql= "create table blahspace(
		blahspace1 varchar(25),
		blahspace2 varchar(25),
		blahsapce3 varchar(25)
		)";
		
  mysql_query($sql,$con);
	
	mysql_close($con);


?>


</body>


</html>