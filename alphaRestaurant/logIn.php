<?php
include_once 'header.php'
?>

<link rel="stylesheet" href="css/form.css">

	<div class="signupForm">
		<form class='form' action="includes/login.inc.php" method="POST">
		<h2 class ="title">Log In </h2>
			<div class="inputContainer">
				<input required type="text" name="uid" class="input" placeholder="Username/Email">
			</div>

			<div class="inputContainer">
				<input required type="password" name="pwd" class="input" placeholder="Password">
			</div>

			<button type="submit" name="submit" class="submitBtn">Log In</button>

			<?php
				if (!isset($_GET['error'])){
					echo "</form>";
				}
				else {
					$loginCheck = $_GET['error'];
		
					if ($loginCheck == "emptyinput"){
						echo "<p style='color:red;>You did not flll in all fields!</p>";
						echo "</form>";
					}
					elseif ($loginCheck == "wronglogin"){
						echo "<p style='color:red;'>Incorrect Login</p>";
						echo "</form>";
					}		
				}
			?>

		</form>

	</div>

<?php
	include 'footer.php';
?>








