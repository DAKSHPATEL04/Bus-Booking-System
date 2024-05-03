<?php
include('./admin/config/dbcon.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the checked seats from the form
    $name = $_POST['busnumber'];
    $id = $_POST['cancel'];

    // Step 1: Fetch the seat values for the ticket to be deleted
    $seatQuery = "SELECT seat FROM ticket WHERE id='$id' AND busnumber='$name'";
    $seatResult = mysqli_query($con, $seatQuery);

    if (!$seatResult) {
        die("Error fetching seat information: " . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($seatResult);
    $seatValue = $row['seat'];

    // Step 2: Fetch the current 'aseats' value from the 'route' table
    $routeQuery = "SELECT aseats FROM route WHERE busnumber='$name'";
    $routeResult = mysqli_query($con, $routeQuery);

    if (!$routeResult) {
        die("Error fetching the value from the route table: " . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($routeResult);
    $currentAseats = $row['aseats'];

    // Step 3: Calculate the new 'aseats' value after deleting the ticket
    // Convert the seat values to an array
    $selectedSeats = explode(',', $seatValue);

    // Calculate the new aseats value by subtracting the count of selected seats
    $newAseats = $currentAseats + count($selectedSeats);

    // Step 4: Delete the selected ticket by ID
    $deleteQuery = "DELETE FROM ticket WHERE id='$id'";

    if (mysqli_query($con, $deleteQuery)) {
        // Step 5: Update the 'aseats' column in the 'route' table
        $updateQuery = "UPDATE route SET aseats = $newAseats WHERE busnumber='$name'";

        if (mysqli_query($con, $updateQuery)) {
            echo  "<script>
            alert('Ticket Cancelled');
            window.location.href='ticket.php';
            </script>";
        } else {
            echo "Error updating aseats value: " . mysqli_error($con);
        }
    } else {
        echo "Error canceling the ticket: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>
