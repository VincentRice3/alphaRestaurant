<?php
    // Check if the form was submitted
    if (isset($_POST['submit'])) {
        // Process form data

        //Includes database connection 
		include_once 'dbh.inc.php';

        // Assign POST variables
        $userID = mysqli_real_escape_string($connR, $_POST['user']);
        $date = mysqli_real_escape_string($connR, $_POST['date']);
        $timeslot = mysqli_real_escape_string($connR, $_POST['timeslot']);
        $first_name = mysqli_real_escape_string($connR, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($connR, $_POST['last_name']);
        $email = mysqli_real_escape_string($connR, $_POST['email']);
        $phone = mysqli_real_escape_string($connR, $_POST['phone']);
        $party = mysqli_real_escape_string($connR, $_POST['party']);

        require_once 'dbh.inc.php';

		require_once 'functions.inc.php';


        if (bookingExists($conn, $date, $timeslot) !== false){
            
            header("location: ../booking.php?error=bookingtaken");
            exit();

        }
    
        createReservation($connR, $userID, $date, $timeslot, $first_name, $last_name, $email, $phone, $party);
    
    }else {
		header("Location: ../booking.php?signup=error");
	}


?>