<?php 
	$guess = $_REQUEST["guess"];
	session_start();
	
		if (!$_SESSION["tries"]){
						$_SESSION["tries"]==0;
					}
	$tries = $_SESSION["tries"];
	$guessed= "Your Last Guess: " . $guess;
	$game= $_SESSION['game'];
	
	$guess_form = <<<FORM
		<form method="post" action="index2.php"
			<p class="legend"> Guess That Number</p><br><br>
			<p>I'm Thinking Of A Number 1-50</p>
			<fieldset id="GUESS">
			<label>Enter Guess Here:</label>
			<p id="buttons">
			<input type="text" id="guess" name="guess" value="" />
			<input type="submit" value="GUESS" />
		</form>
FORM;

	$show_form = $guess_form;
	if (isset($_SESSION["number_to_guess"])){

		if (!$guess){
			$response = "TAKE A GUESS<br>";			
		}
		elseif ($guess>50){
			$response="Please Guess A Number BETWEEN 1 and 50"."<br />";		
		}
		elseif ($guess<1){
			$response="Please Guess A Number BETWEEN 1 and 50"."<br />";
		}
		
	else { 
			
			if ($guess > $_SESSION["number_to_guess"]){ 
				echo "LOWER";
					$_SESSION["tries"]=$_SESSION["tries"]+1;
				$response = "LOWER<img src='Man_with_candles.gif'/><p>";	
					                       
			}
			
			elseif ($guess == $_SESSION["number_to_guess"]){									
						echo "It Took You "	. $_SESSION["tries"]=$_SESSION["tries"]+1 ." Tries";            
				unset($_SESSION['number_to_guess']);
				$show_form = "";
				
				$con = mysql_connect("localhost","root","");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }

				mysql_select_db("blahblah_db",$con);

				$sql="insert into games (created_on)
				VALUES
				(now())";

					if (!mysql_query($sql,$con)){
						die ('error:' .mysql_error());
				}

				mysql_close($con);
		

				
				$response =<<<RESET
					<p>good job play again?</p>
					<form action="index2.php" method="post">
						<input type="submit" name="reset" value="play again" id="reset" />
					</form>
					<img src="Happy_Kwanzaa_2.gif"/>
				 Great Job, Would You Like To Play <a href='?reset=true'>Again</a>
RESET;
			
			unset($_SESSION['tries']);
			
			}
		  elseif ($guess < $_SESSION["number_to_guess"]){
				$response = "HIGER <img src='Boy.gif'/> <p>";
			$_SESSION["tries"]=$_SESSION["tries"]+1;	
			}
		}
	}
 	else {
			$_SESSION["number_to_guess"]=rand(1,50);
	}
	
	
?>



<html>
	<head>
		<title> GUESS THAT NUMBER PAGE TWO   </title> 
</head>

	<body>
		
		<?php echo $show_form; ?>
		<?php echo $response; ?>
		<br>
		<?PHP echo $guessed; ?>		
		
		
		<script type="text/javascript">
     document.body.bgColor="red";

		function displaymessage()
		{
		alert("Fuck You Keep Trying :p");
	}
	
	
		</script>
		
		
		<form>
		<input type="button" value="HINT"
		onClick="displaymessage();" >
		</form>
	
		<?php
		$con = mysql_connect("localhost","root","");
		if (!$con)
		
		  {
		  die('Could not connect: ' . mysql_error());
		  }

		mysql_select_db("blahblah_db",$con);

		$sql="insert into guess_data (guess_number,number_guessed)
		VALUES
		('$_SESSION[tries]','$_POST[guess]')";
		
			if (!mysql_query($sql,$con)){
				die ('error:' .mysql_error());
      }

		mysql_close($con);

		?>

		<?php
		$con = mysql_connect ("localhost","root","");
			if (!$con)
				{
					die('could not connect: ' . mysql_error());
				}

			mysql_select_db("blahblah_db", $con);

				$result = mysql_query("SELECT * FROM guess_data");

				echo "<table border='1'>
				<tr>
				<th>try</th>
				<th>number guessed</th>
				</tr>";

				while($row = mysql_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" . $row['guess_number'] . "</td>";
					echo "<td>" . $row['number_guessed'] . "</td>";
					echo "</tr>";
					}
			echo "</table>";

		mysql_close($con);
		?>
	
	

	</body>
</html>