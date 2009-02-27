<html>

 <head> <title>GUESS THE NUMBER</title>   </head>

    <body>

<?php
	$guess = $REQUEST["guess"];
		session_start();

		 if (isset($_SESSION["number_to_guess"])){
	echo "x= $_SESSION[number_to_guess]";
         
		if (!$guess){
		echo "take a guess";	
		   }
		else{
					if ($guess > $_SESSION["number_to_guess"]){ 
						echo "to high";
						 }	
					elseif ($guess < $_SESSION["number_to_guess"]){
						echo "higher";
					   }
							elseif ($guess == $_SESSION["number_to_guess"]){
								unset($_SESSION['number_to_guess']);	
					       }
		
			   	}
       }


			else {
				$_SESSION["number_to_guess"]=rand(1,50);
			     }
			?>



	 <form method="post" action="guess.php"
	<p class="legend"> Guess That Number</p>
	<fieldset id="guess">
	<label>Enter Guess Here:</label><input type="text"
	name="guess" size="72" /> <br/>
	<p id="buttons"><input type="submit"
	value="submit number" />
	</form>










    </body>

</html>