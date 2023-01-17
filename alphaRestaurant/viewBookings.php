<?php
include_once 'header.php'
?>

<link rel="stylesheet" href="css/table.css">

<?php

include_once 'includes/dbh.inc.php';

?>



<?php

    $userID = $_SESSION["user_uid"];

    $sql = "SELECT * FROM reservations WHERE userID = '$userID';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

?>

<?php

    if(isset($_GET['reservation_ID'])){

        $reservation_ID=$_GET["reservation_ID"];
        $delete = mysqli_query($conn, "DELETE FROM `reservations` WHERE `reservations`.`reservation_ID` = '$reservation_ID'");

    }


?>


<br>
<div class="table-container">

    <h1 class="heading">Current Bookings</h1>

    <table class="bookingsTable">
            <thead>
                <th>Booking Ref</th>
                <th>User</th>
                <th>Date of Booking</th>
                <th>Reserved From</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
                <th>Contact Number</th>
                <th>Party No.</th>
                <th>Cancel Booking</th>
            </thead>
        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>      
            
        <tbody>
            <tr>
                <td data-label="Booking Ref"><?php echo $row['reservation_ID']; ?></td>
                <td data-label="User"><?php echo $row['userID']; ?></td>
                <td data-label="Date of Booking"><?php echo $row['dateBooking']; ?></td>
                <td data-label="Booking Slot"><?php echo $row['timeslot']; ?></td>
                <td data-label="First Name"><?php echo $row['firstName']; ?></td>
                <td data-label="Last Name"><?php echo $row['lastName']; ?></td>
                <td data-label="Email Address"><?php echo $row['email']; ?></td>
                <td data-label="Contact Number"><?php echo $row['phoneNo']; ?></td>
                <td data-label="Party No."><?php echo $row['party']; ?></td>
                <td data-label="Cancel"><?php echo "<a href='viewBookings.php?reservation_ID=".$row['reservation_ID']."'> Cancel </a> ";?> </td>
            </tr>
        </tbody>
            
        <?php       
            }
        ?>


    </table>

    <br>
        
</div>
    <?php
    include_once 'footer.php'
    ?>