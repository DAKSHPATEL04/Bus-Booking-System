<?php

include('./admin/auth.php');
include('./admin/config/dbcon.php');

if (isset($_POST['bookbtn'])) {

    $uid = $_SESSION['auth_user']['user_id'];
    $id = $_POST['busid'];
    // echo $id . "<br>";
    $bus = $_POST['pname'];
    $name = $_POST['busnumber'];
    $phone = $_POST['busname'];
    $date = $_POST['date'];
    $username = $_POST['departure'];
    $password = $_POST['duration'];
    $ss = $_POST['arrival'];
    $colorsString = isset($_POST['checkbox_values']) ? $_POST['checkbox_values'] : array();
    $ssss = $_POST['price'];
    $sssss = $_POST['pay'];

    $colorsString = implode(",", $colorsString);
    // Initialize the bus number and seat to book

    // Initialize the bus number


    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the checked seats from the form
        $selectedSeats = isset($_POST['checkbox_values']) ? $_POST['checkbox_values'] : array();

        // Step 1: Fetch the current 'aseats' value from the 'route' table
        $routeQuery = "SELECT aseats FROM route WHERE busnumber='$name'";
        $routeResult = mysqli_query($con, $routeQuery);

        if (!$routeResult) {
            die("Error fetching the value from the route table: " . mysqli_error($con));
        }

        $row = mysqli_fetch_assoc($routeResult);
        $currentAseats = $row['aseats'];

        // Step 2: Check if the selected seats are available
        $query = "SELECT seat FROM ticket WHERE id='$id'";
        // echo $query . "<br>";

        $result = mysqli_query($con, $query);

        if (!$result) {
            die("Database query failed.");
        }

        // Initialize an array to store the booked seats
        $bookedSeats = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $fieldValue = $row['seat'];
            // Split the field value into an array based on the comma separator
            $fieldValues = explode(',', $fieldValue);

            // Add the values to the array
            foreach ($fieldValues as $value) {
                $bookedSeats[] = trim($value); // Trim to remove any extra spaces
            }
        }

        // Check if any of the selected seats are already booked
        $alreadyBookedSeats = array_intersect($selectedSeats, $bookedSeats);

        if (!empty($alreadyBookedSeats)) {
            echo "The following seats are already booked: " . implode(', ', $alreadyBookedSeats);
        } else {
            // Step 3: Book the selected seats and update 'aseats' value
            $newAseats = $currentAseats - count($selectedSeats);

            // Convert $selectedSeats to a comma-separated string
            $selectedSeatsString = implode(',', $selectedSeats);

            // Insert the booked seats into the 'ticket' table
            $insertQuery = "INSERT INTO ticket (uid,pname,busnumber,busname,date,departure,duration,arrival,seat,fare,pay,bus_id) VALUES($uid,'$bus','$name','$phone','$date','$username','$password','$ss','$colorsString','$ssss','$sssss','$id')";
            // echo $insertQuery;

            if (empty($colorsString)) {
                echo "<script>alert('Please select at least one seat to book.');
            window.history.back(); // Go back to the previous page
            </script>";
            } elseif (mysqli_query($con, $insertQuery)) {
                // Update the 'aseats' column in the 'route' table
                $updateQuery = "UPDATE route SET aseats = $newAseats WHERE busnumber='$name'";
                if (empty($colorsString)) {
                    echo "<script>alert('Please select at least one seat to book.');
                window.history.back(); // Go back to the previous page
                </script>";
                } elseif (mysqli_query($con, $updateQuery)) {

                    echo  "<script>
                alert('Ticket Booked Succesfully! Check Ticket Section');
                window.location.href='ticket.php';
                </script>";
                } else {
                    echo "Error updating aseats value: " . mysqli_error($con);
                }
            } else {
                echo "Error booking the seats: " . mysqli_error($con);
            }
        }
    }

    // Close the database connection
    mysqli_close($con);
}
