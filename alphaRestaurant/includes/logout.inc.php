<?php

session_start();

session_unset();

session_destroy();

header("location: ../indexMain.php?error=emptyinput");

exit();