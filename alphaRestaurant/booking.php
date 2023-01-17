<?php
include_once 'header.php'
?>


<link rel="stylesheet" href="css/form.css">
<section>
    <div class="signupForm">

        <form class="form" action="includes/booking.inc.php" method="POST">
            
            <h2 class="title">Reservation Form</h2>
                    
            <?php

                echo"
                    
                    <h3 class='head'>User</h3>
                            
                    <div class='inputContainer'>

                        <input readonly id='user' class='input' type='text' name='user' placeholder= ". 
                        
                        $_SESSION["user_uid"] . " value = '" . $_SESSION["user_uid"] ."'>
                            
                    </div>
                                
                ";
            ?>

            <h3 class="head">Booking Date:</h3>

            <div class="inputContainer">
                                
                <input name="date" id="date" class='input' type="date" required>

            </div>

            <h3 class="head"> Booking Time:</h3>

            <div class="inputContainer">

                <select id="timeslot" class="input" name ="timeslot" required> 
                    <option option disabled selected value=""> Please Select </option>
                    <option value = "12:00 - 13:30" > 12:00 - 13:30 </option>
                    <option value = "12:15 - 13:45" > 12:15 - 13:45 </option>
                    <option value = "12:30 - 14:00" > 12:30 - 14:00 </option>
                    <option value = "12:45 - 14:15" > 12:45 - 14:15 </option>
                    <option value = "13:00 - 14:30" > 13:00 - 14:30 </option>
                    <option value = "13:15 - 14:45" > 13:15 - 14:45 </option>
                    <option value = "13:30 - 15:00" > 13:30 - 15:00 </option>                            
                    <option value = "13:45 - 15:15" > 13:45 - 15:15 </option>
                    <option value = "14:00 - 15:30" > 14:00 - 15:30 </option>
                    <option value = "14:15 - 15:45" > 14:15 - 15:45 </option>
                    <option value = "14:30 - 16:00" > 14:30 - 16:00 </option>
                    <option value = "14:45 - 16:15" > 14:45 - 16:15 </option>
                    <option value = "15:00 - 16:30" > 15:00 - 16:30 </option>
                    <option value = "15:15 - 16:45" > 15:15 - 16:45 </option>
                    <option value = "15:30 - 17:00" > 15:30 - 17:00 </option>
                    <option value = "15:45 - 17:15" > 15:45 - 17:15 </option>                            
                    <option value = "16:00 - 17:30" > 16:00 - 17:30 </option>
                    <option value = "16:15 - 17:45" > 16:15 - 17:45 </option>
                    <option value = "16:30 - 18:00" > 16:30 - 18:00 </option>
                    <option value = "16:45 - 18:15" > 16:45 - 18:15 </option>
                    <option value = "17:00 - 18:30" > 17:00 - 18:30 </option>
                    <option value = "17:15 - 18:45" > 17:15 - 18:45 </option>
                    <option value = "17:30 - 19:00" > 17:30 - 19:00 </option>
                    <option value = "17:45 - 19:15" > 17:45 - 19:15 </option>
                    <option value = "18:00 - 19:30" > 18:00 - 19:30 </option>
                    <option value = "18:15 - 19:45" > 18:15 - 19:45 </option>
                    <option value = "18:30 - 20:00" > 18:30 - 20:00 </option>
                    <option value = "18:45 - 20:15" > 18:45 - 20:15 </option>
                    <option value = "19:00 - 20:30" > 19:00 - 20:30 </option>
                    <option value = "19:15 - 20:45" > 19:15 - 20:45 </option>
                    <option value = "19:30 - 21:00" > 19:30 - 21:00 </option>
                    <option value = "19:45 - 21:15" > 19:45 - 21:15 </option>
                </select>

            </div>

            <br>

            <h3 class="head">First Name</h3>

            <div class="inputContainer">

                <input id="first_name" class="input" type="text" name="first_name" placeholder="First Name" required>

            </div>

            <h3 class="head">Last Name</h3>

            <div class="inputContainer">
                <input id="last_name" class="input" type="text" name="last_name" placeholder="Last Name" required>
            </div>

            <h3 class="head">Email</h3>

            <div class="inputContainer">
                <input id="email" type="email" class="input" name="email" placeholder="Your Email" required>
            </div>

            <h3 class="head">Phone</h3>

            <div class="inputContainer">
                
                <input id="phone" type="tel" class="input" name="phone" placeholder="Your Phone Number" required>
            
            </div>

            <h3 class="head">Party No. (If more than 4 - reservations to be made in person)</h3>

            <div class="inputContainer">
                    <select id="party" class="input" name="party" required>
                        <option disabled selected value="">--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                            
                    </select>
            </div>

            <button type="submit" name="submit" class="submitBtn">Reserve</button>

            <?php
                        
                if (!isset($_GET['error'])){
                                        
                    echo"</form>";

                }else{
                    $bookingCheck = $_GET['error'];
                
                    if($bookingCheck == "bookingtaken"){
                        echo "<p style='color:red;'>Booking already exists<p>";
                    }
                }
                    
            ?>
            
        </form>

    </div>

</section>
<script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("date")[0].setAttribute('min', today);

</script>

<?php
    include_once 'footer.php'
?>

