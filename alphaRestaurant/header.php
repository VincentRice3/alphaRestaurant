<?php
    session_start();

?>

<?php
function isAdmin()
    {
        if (isset($_SESSION['user_uid']) && $_SESSION['user_uid'] == 'Admin' ) {
            return true;
        }
        else{
            return false;
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BetaBytes</title>
    <link rel="icon" type="image/x-icon" href="images/greek.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/globalStyles.css">
    <link rel="stylesheet" href="css/components.css">
    <!-- aos css -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>

    <?php
        if(isset($_SESSION["user_uid"])){
            echo "<p style='font-size:20px; text-align: right; padding: 2rem 2rem;'> Hello " .$_SESSION["user_uid"] . "</p>";
        }

    ?>

    <div id="nav" class="nav">

        <div class="container">

            <div class="nav__wrapper">
                <a href="indexMain.php" class="logo">
                <img src="images/Color logo - no background.svg" alt="Alpha Restaurant">
                </a>
                <nav>
                    <div class="nav__icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            >
                            <line x1="3" y1="12" x2="21" y2="12" />
                            <line x1="3" y1="6" x2="21" y2="6" />
                            <line x1="3" y1="18" x2="21" y2="18" />
                        </svg>
                    </div>
                    <div class="nav__bgOverlay"></div>
                    <ul class="nav__list">
                        <div class="nav__close">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            >
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </div>
                        <div class="nav__list__wrapper">
                            <li><a href="indexMain.php" 
                            class="nav__link">Home</a></li>
                            <li><a href="menu.php" 
                            class="nav__link">Menu</a></li>
                            <li><a href="contact.php" 
                            class="nav__link">Contact Us</a></li>
                            <li><a href="about.php" 
                            class="nav__link">About Us</a></li>
                            <?php

                            ?>

                            <?php

                                if (isAdmin() == true){

                                    echo "<li class='nav__link'><a href='viewAllBookings.php'>View All Bookings</a></li>";

                                    echo "<li class='nav__link'><a href='includes/logout.inc.php'>Log-Out</a></li>";

                                }elseif(isAdmin() == false){

                                    if(isset($_SESSION["user_uid"])){

                                    echo "<li class='nav__link'><a href='viewBookings.php'>View Bookings</a></li>";

                                    echo "<li class='nav__link'><a href='includes/logout.inc.php'>Log-Out</a></li>";

                                    echo "<li class='nav__link'><a class='btn' href='booking.php'>Book Table</a></li>";
                                    }                
                                    
                                    else{
                                        echo "<li class='nav__link'><a href='signup.php'>Sign Up</a></li>";

                                        echo "<li class='nav__link'><a href='logIn.php'>Log In</a></li>";
                                    }
                                }
                            ?>
                        </div>
                    </ul>
                </nav>
            </div>

        </div>


    </div>
    


    <!-- aos script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    
    <!-- Custom Script -->
    <script src="scripts/main.js"></script>


</body>