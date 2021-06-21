<?php 
			function checkIFEmpty($input){
				
				if(empty($input) == true){ 
					return true;
				}
				else{return false;
				}
			}

			function printEmpty(){
				echo " O Campo é Obrigatório";
			}	
		
			function temp($input){
					$text = ""; 
					$text = trim($_POST[$input]); 
					$text = stripslashes($text); 
					$text = htmlspecialchars($text);
					echo "<br>";
					return $text;
					}
			
		?>