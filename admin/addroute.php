<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="registered.css">
  <title>Admin Panel</title>
  <?php
  include('auth.php');
  include('includes/sidebar.php');
  include('includes/topbar.php');
  include('config/dbcon.php');
  ?>
</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="container">
    <div class="content" style="
    top: 90px;">

      <div class="wrapper">
        <div class="title">
          Add Route
        </div>
        <form action="routecode.php" method="POST">
          <div class="form">
            <div class="inputfield">
              <label for=""> Bus No</label>
              <input type="text" name="busnumber" class="input" placeholder="bus no" minlength="3" maxlength="12" required>
            </div>
            <div class="inputfield">
              <label for=""> Available Seats</label>
              <input type="number" name="aseats" class="input" placeholder="total seats" value="50" required readonly>
            </div>
            <div class="inputfield">
              <label for=""> Bus Name</label>
              <input type="text" name="name" class="input" placeholder="bus name" minlength="3" maxlength="12" required>
            </div>
            <div class="inputfield">
              <label for="">Departure</label>
              <input type="text" name="depart" class="input" placeholder="from" minlength="3" maxlength="12" required>
            </div>
            <div class="inputfield">
              <label for="">Duration</label>
              <input type="time" name="duration" class="input" placeholder="time" required>
            </div>
            <div class="inputfield">
              <label for="">Arrival</label>
              <input type="text" name="arrival" class="input" placeholder="to" minlength="3" maxlength="12" required>
            </div>

            <div class="inputfield">
              <label for="datePicker">Departure Date</label>
              <input type="date" name="date" class="input" placeholder="on" id="datePicker" required>
            </div>
            <div class="inputfield">

              <label for="">Fare</label>
              <input type="text" name="fare" class="input" placeholder="fare" minlength="3" maxlength="5" required>
            </div>

            <div class="inputfield">
              <input type="submit" class="btn" name="addroute" value="Save">
            </div>
            <div class="inputfield">
              <a href="route.php" class="btn">Close</a>

            </div>

          </div>
        </form>
      </div>
    </div>
  </div>

</body>
<script>
  // Get today's date in the format "YYYY-MM-DD"
  function getToday() {
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0'); // Month is 0-based
    const day = String(now.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
  }

  // Set the min attribute of the date input to today's date
  document.getElementById("datePicker").setAttribute("min", getToday());
</script>

</html>