<?php

function emptyInputSignup($first, $last, $email, $uid, $pwd){
    $result;
		//Checks if inputs are empty 
	if(empty($first) || empty($last) || empty($email)|| empty($uid)|| empty($pwd)) {
        $result = true;
	} else {
        $result = false;
    }

    return $result;
}

function invalidUid($uid) {
    $result;
	
	if(!preg_match("/^[a-zA-Z0-9]*$/", $uid)) {
        $result = true;
	} else {
        $result = false;
    }

    return $result;
}

function invalidEmail($email) {
    $result;
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
	} else {
        $result = false;
    }

    return $result;
}

function uidExists($conn, $uid, $email) {
    $sql = "SELECT * FROM users WHERE user_uid = ? OR user_email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    } 

    mysqli_stmt_bind_param($stmt, "ss", $uid, $email);

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){

        return $row;

    }else{

        $result = false;
        return $result;
    }
	
    mysqli_stmt_close($stmt);
}


function bookingExists($conn, $date, $timeslot) {
    $sql = "SELECT * FROM reservations WHERE dateBooking = ? OR timeslot = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../booking.php?error=stmtfailed");
        exit();
    } 

    mysqli_stmt_bind_param($stmt, "ss", $date, $timeslot);

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){

        return $row;

    }else{

        $result = false;
        return $result;
    }
	
    mysqli_stmt_close($stmt);
}

function createUser($conn, $first, $last, $email, $uid, $pwd) {


    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES (?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){

        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $email, $uid, $hashedPwd);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../indexMain.php");
    exit();
}

function createReservation($connR, $userID, $date, $timeslot, $first_name, $last_name, $email, $phone, $party){


    $sql = "INSERT INTO reservations (userID, dateBooking, timeslot, firstName, lastName, email, phoneNo, party)

    VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($connR);

    if (!mysqli_stmt_prepare($stmt, $sql)){

        header("location: ../booking.php?error=stmtfailed");
        exit();

    }

    mysqli_stmt_bind_param($stmt, "ssssssss", $userID, $date, $timeslot, $first_name, $last_name, $email, $phone, $party);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../viewBookings.php");
    exit();

}

function emptyInputLogin($uid, $pwd){
    $result;
		//Checks if inputs are empty 
	if(empty($uid) || empty($pwd)) {
        $result = true;
	} else {
        $result = false;
    }

    return $result;
}

function loginUser($conn, $uid, $pwd){
    $uidExists = uidExists($conn, $uid, $uid);

    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["user_pwd"];
    $checkPWD = password_verify($pwd, $pwdHashed);

    if($checkPWD === false){
        header("location: ../login.php?error=wronglogin");
        exit();

    }elseif($checkPWD === true){
        session_start();
        $_SESSION["user_id"] = $uidExists["user_id"];
        $_SESSION["user_uid"] = $uidExists["user_uid"];
        header("location: ../indexMain.php");
        exit();
    }
}      


