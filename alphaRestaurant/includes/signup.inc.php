<?php
	//Checks to see if the user has clicked signup button
	if (isset($_POST['submit'])) {
		//Includes database connection 
		include_once 'dbh.inc.php';
		
		//Retrieves data from the signup form, using a php function to convert data to string to prevent SQL injections
		$first = mysqli_real_escape_string($conn, $_POST['first']);
		$last = mysqli_real_escape_string($conn, $_POST['last']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$uid = mysqli_real_escape_string($conn, $_POST['uid']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

		require_once 'dbh.inc.php';

		require_once 'functions.inc.php';
		
		if (emptyInputSignup($first, $last, $email, $uid, $pwd) !== false){

			header("location: ../signup.php?error=emptyinput");

			exit();
		}

		if (invalidUid($uid) !== false){

			header("location: ../signup.php?error=invaliduid");
			exit();
		}

		if (invalidEmail($email) !== false){

			header("location: ../signup.php?error=invalidemail");
			exit();
		}

		if (uidExists($conn, $uid, $email) !== false){

			header("location: ../signup.php?error=usernametaken");
			exit();
		}

		createUser($conn, $first, $last, $email, $uid, $pwd);

		
	}else {
		header("Location: ../signup.php?signup=error");
	}

?>
