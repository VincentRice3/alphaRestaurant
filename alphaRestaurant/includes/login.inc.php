<?php

if(isset($_POST["submit"])){

    include_once 'dbh.inc.php';

    $uid = mysqli_real_escape_string($conn,$_POST["uid"]);

    $pwd = mysqli_real_escape_string($conn,$_POST["pwd"]);

    require_once 'dbh.inc.php';

    require_once 'functions.inc.php';

    if (emptyInputLogin($uid, $pwd) !== false){

        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $uid, $pwd);
}

else{
    header("location: ../login.php");
    exit();

}