<?php
include_once 'header.php'

?>

<link rel="stylesheet" href="css/form.css">

	<div class="signupForm">
		<form action="includes/signup.inc.php" method="POST" class="form">
		<h2 class="title">Sign Up</h2>
			<?php
				if (isset($_GET['first'])){
					$first = $_GET['first'];
					echo '
						<div class="inputContainer">
							<input required type="text" name="first" class="input" placeholder="First Name" value="'.$first.'">
						</div>
					';
				}
				else{
					echo '
							<div class="inputContainer">								
								<input required type="text" name="first" class="input" placeholder="First Name">						
							</div>
						';
				}
			?>
			<?php
				if (isset($_GET['last'])){
					$last = $_GET['last'];
					echo '
						<div class="inputContainer">
							<input required type="text" name="last" class="input" placeholder="Last Name" value="'.$last.'">						
						</div>
					';
				}
				else{
					echo '
						<div class="inputContainer">						
							<input required type="text" name="last" class="input" placeholder="Last Name">						
						</div>
					';
				}	
				
			?>
			<?php
				if (isset($_GET['email'])){
					$email = $_GET['email'];
					echo '
						<div class="inputContainer">						
							<input required type="text" name="email" class="input" placeholder="E-mail" value="'.$email.'">							
						</div>
					';				
				}
				else{
					echo '
						<div class="inputContainer">
							<input required type="text" name="email" class="input" placeholder="E-mail">							
						</div>
					';
				}		
			?>
			<?php	
				if (isset($_GET['uid'])){
					$uid = $_GET['uid'];
					echo '
						<div class="inputContainer">
							<input required type="text" name="uid" class="input" placeholder="Username" value="'.$uid.'">								
						</div>
					';
				}
				else{
					echo '
						<div class="inputContainer">
							<input required type="text" name="uid" class="input" placeholder="Username">		
						</div>
					';
				}	
			?>
			<br>
				<div class="inputContainer">
					<input required type="password" name="pwd" class="input" placeholder="Password">
				</div>
			<br>
			<button type="submit" name="submit" class="submitBtn">Sign Up</button>

			<?php
					if (!isset($_GET['error'])){		
						echo "</form>";
					}
					else {
						$signupCheck = $_GET['error'];
						
						if ($signupCheck == "emptyinput"){
							echo "<p style='color:red;'>You did not flll in all fields!<p>";
						}
						elseif ($signupCheck == "invalidemail"){
							echo "<p style='color:red;'>You used invalid email!<p>";
						}		
						elseif ($signupCheck == "invaliduid"){
							echo "<p style='color:red;'>You used invalid username!<p>";
						}	
						elseif($signupCheck == "usernametaken"){
							echo "<p style='color:red;'>This username and / or email adress is already in use!<p>";
						}	

						elseif ($signupCheck == "stmtfailed"){
							echo "<p style='color:red;'>Something went wrong...!<p>";
						}

						elseif ($signupCheck == "none"){
							echo "<p style='color:Green;'>You have signed up successfully!<p>";
						}
					}
				?>
		</form>
	</div>

<?php
include_once 'footer.php'
?>




