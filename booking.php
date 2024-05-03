<?php
include('./admin/auth.php');
include('./admin/config/dbcon.php');




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bus India | Ticket Booking</title>
  <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
  <!-- swiper css link  -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- custom css file link  -->
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="seat.css">
  <link rel="stylesheet" href="mode_bot.css">
  <script language="javascript" type="text/javascript" src="f.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .btn:hover {
      background: rgba(255, 165, 0, 0.2);
      color: #ffa500 !important;
    }

    .btn-increment-decrement {
      display: inline-block;
      padding: 5px 0px;
      background: #e2e2e2;
      width: 30px;
      text-align: center;
      cursor: pointer;
    }
  </style>
  <script language="javascript" type="text/javascript" src="f.js"></script>







  <script>
    var inputLtc = document.getElementById('input-ltc'),
      inputBtc = document.getElementById('input-btc');

    var constantNumber = <?php echo $row['fare'] ?>;

    inputLtc.onchange = function() {
      var result = parseFloat(inputLtc.value) * constantNumber;
      inputBtc.value = !isNaN(result) ? result : '';
    };
  </script>
</head>

<body>



  <!-- header section starts  -->

  <header>

    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="#" class="logo"><span>B</span>us India</a>

    <nav class="navbar">
      <a href="user.php"> Home</a>

      <a href="ticket.php">Ticket</a>
      <a href="profile/profile.php">

        <?php
        if (isset($_SESSION['auth'])) {
          echo $_SESSION['auth_user']['user_name'];
        } else {
          echo "not logged in";
        }
        ?></a>

      <a href="logout.php">Logout</a>
    </nav>

    </nav>





  </header>

  <!-- header section ends -->
  <!-- home section starts  -->

  <section class="home" id="home">

  </section>



  <section class="book" id="book">
    <script>
      function myfun() {
        var a = document.getElementById('num1').value;
        var b = document.getElementById('num2').value;
        document.getElementById('result').value = (a * b);
      }
    </script>


    <div class="row">

      <div class="image">
        <img src="images/115.jpg" alt="">
        <p></p>
        <img src="images/book-img.png" alt="">
        <p></p>
        <img src="images/111.jpg" alt="">
        <p></p>
        <img src="images/113.jpg" alt="">
        <p></p>
        <img src="images/112.jpg" alt="">
        <p></p>
      </div>



      <form action="tickett.php" method="post" id="checkboxForm">
        <?php
        if (isset($_GET['route_id'])) {
          $route_id = $_GET['route_id'];
          $query = "SELECT * FROM route WHERE id='$route_id'";
          $query_run = mysqli_query($con, $query);
          if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $row) {
        ?>
              <?php function getProductRate($route_id, $con)
              {
                $sql = "SELECT fare FROM route WHERE id = $route_id";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  return $row["rate"];
                }
                return 0; // Return 0 if product is not found
              } ?>


              <h1 class="heading" style="margin-top: 50px; padding-bottom:2rem;">
                <span>B</span>
                <span>O</span>
                <span>O</span>
                <span>K</span>

                <span class="space"></span>
                <span>N</span>
                <span>O</span>
                <span>W</span>
              </h1>
              <input type="hidden" name="id" placeholder="" required>
              <div class="inputBox">
                <h3>Name</h3>
                <input type="text" name="pname" placeholder="" required>
              </div>
              <div class="inputBox">
                <h3>Date of Travel</h3>
                <input type="date" name="date" placeholder="" value="<?php echo $row['datee']; ?>" required>
              </div>
              <div class="inputBox">
                <h3>Bus Number</h3>
                <input type="text" name="busnumber" placeholder="" value="<?php echo $row['busnumber']; ?>">
                <input hidden type="text" name="busid" placeholder="" value="<?php echo $row['id']; ?>">

              </div>
              <div class="inputBox">
                <h3>Bus Name</h3>
                <input type="text" name="busname" placeholder="" value="<?php echo $row['busname']; ?>">

              </div>


              <div class="inputBox">
                <h3>Departure</h3>
                <input type="text" name="departure" placeholder="" value="<?php echo $row['departure']; ?>">
              </div>
              <div class="inputBox">
                <h3>Departure Time</h3>
                <input type="text" name="duration" placeholder="" value="<?php echo $row['duration']; ?>">
              </div>
              <div class="inputBox">
                <h3>Arrival</h3>
                <input type="text" name="arrival" placeholder="" value="<?php echo $row['arrival']; ?>">

              </div>
              <div class="inputBox">
                <h3>Seat</h3>
                <div class="bus seat2-2 border-0 p-0" style="margin-left:120px ;">
                  <div class="seat-row-1">
                    <ol class="seats">
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-1" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A1">
                        <label for="seat-checkbox-1-1">
                          1 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-2" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A2">
                        <label for="seat-checkbox-1-2">
                          2 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-3" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A3">
                        <label for="seat-checkbox-1-3">
                          3 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-4" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A4">
                        <label for="seat-checkbox-1-4">
                          4 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-5" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A5">
                        <label for="seat-checkbox-1-5">
                          5 </label>
                      </li>
                      </li>
                    </ol>
                  </div>

                  <div class="seat-row-2">
                    <ol class="seats">
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-6" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A6">
                        <label for="seat-checkbox-1-6">
                          6 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-7" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A7">
                        <label for="seat-checkbox-1-7">
                          7 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-8" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A8">
                        <label for="seat-checkbox-1-8">
                          8 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-9" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A9">
                        <label for="seat-checkbox-1-9">
                          9 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-10" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A10">
                        <label for="seat-checkbox-1-10">
                          10 </label>
                      </li>
                      </li>
                    </ol>
                  </div>

                  <div class="seat-row-3">
                    <ol class="seats">
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-11" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A11">
                        <label for="seat-checkbox-1-11">
                          11 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-12" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A12">
                        <label for="seat-checkbox-1-12">
                          12 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-13" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A13">
                        <label for="seat-checkbox-1-13">
                          13 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-14" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A14">
                        <label for="seat-checkbox-1-14">
                          14 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-15" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A15">
                        <label for="seat-checkbox-1-15">
                          15 </label>
                      </li>
                      </li>
                    </ol>
                  </div>

                  <div class="seat-row-4">
                    <ol class="seats">
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-16" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A16">
                        <label for="seat-checkbox-1-16">
                          16 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-17" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A17">
                        <label for="seat-checkbox-1-17">
                          17 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-18" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A18">
                        <label for="seat-checkbox-1-18">
                          18 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-19" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A19">
                        <label for="seat-checkbox-1-19">
                          19 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-20" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A20">
                        <label for="seat-checkbox-1-20">
                          20 </label>
                      </li>
                      </li>
                    </ol>
                  </div>

                  <div class="seat-row-5">
                    <ol class="seats">
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-21" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A21">
                        <label for="seat-checkbox-1-21">
                          21 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-22" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A22">
                        <label for="seat-checkbox-1-22">
                          22 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-23" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A23">
                        <label for="seat-checkbox-1-23">
                          23 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-24" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A24">
                        <label for="seat-checkbox-1-24">
                          24 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-25" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A25">
                        <label for="seat-checkbox-1-25">
                          25 </label>
                      </li>
                      </li>
                    </ol>
                  </div>

                  <div class="seat-row-6">
                    <ol class="seats">
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-26" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A26">
                        <label for="seat-checkbox-1-26">
                          26 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-27" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A27">
                        <label for="seat-checkbox-1-27">
                          27 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-28" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A28">
                        <label for="seat-checkbox-1-28">
                          28 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-29" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A29">
                        <label for="seat-checkbox-1-29">
                          29 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-30" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A30">
                        <label for="seat-checkbox-1-30">
                          30 </label>
                      </li>
                      </li>
                    </ol>
                  </div>

                  <div class="seat-row-7">
                    <ol class="seats">
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-31" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A31">
                        <label for="seat-checkbox-1-31">
                          31 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-32" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A32">
                        <label for="seat-checkbox-1-32">
                          32 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-33" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A33">
                        <label for="seat-checkbox-1-33">
                          33 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-34" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A34">
                        <label for="seat-checkbox-1-34">
                          34 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-35" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A35">
                        <label for="seat-checkbox-1-35">
                          35 </label>
                      </li>
                      </li>
                    </ol>
                  </div>

                  <div class="seat-row-8">
                    <ol class="seats">
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-36" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A36">
                        <label for="seat-checkbox-1-36">
                          36 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-37" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A37">
                        <label for="seat-checkbox-1-37">
                          37 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-38" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A38">
                        <label for="seat-checkbox-1-38">
                          38 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-39" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A39">
                        <label for="seat-checkbox-1-39">
                          39 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-40" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A40">
                        <label for="seat-checkbox-1-40">
                          40 </label>
                      </li>
                      </li>
                    </ol>
                  </div>

                  <div class="seat-row-9">
                    <ol class="seats">
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-41" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A41">
                        <label for="seat-checkbox-1-41">
                          41 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-42" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A42">
                        <label for="seat-checkbox-1-42">
                          42 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-43" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A43">
                        <label for="seat-checkbox-1-43">
                          43 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-44" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A44">
                        <label for="seat-checkbox-1-44">
                          44 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-45" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A45">
                        <label for="seat-checkbox-1-45">
                          45 </label>
                      </li>
                      </li>
                    </ol>
                  </div>

                  <div class="seat-row-10">
                    <ol class="seats">
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-46" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A46">
                        <label for="seat-checkbox-1-46">
                          46 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-47" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A47">
                        <label for="seat-checkbox-1-47">
                          47 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-48" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A48">
                        <label for="seat-checkbox-1-48">
                          48 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-49" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A49">
                        <label for="seat-checkbox-1-49">
                          49 </label>
                      </li>
                      <li class="seat">
                        <input role="input-passenger-seat" type="checkbox" class="seat-checkbox" id="seat-checkbox-1-50" name="checkbox_values[]" data-fare='<?php echo $row['fare']; ?>' value="A50">
                        <label for="seat-checkbox-1-50">
                          50 </label>
                      </li>
                      </li>
                    </ol>
                  </div>
                </div>
              </div>


              <div class="inputBox">
                <h3>Fare</h3>
                <input type="text" name="fare" value="<?php echo $row['fare']; ?>" disabled>

              </div>


              <div class="inputBox">

                <h3> Total Fare:</h3> <input type="text" id="totalFareInput" name="price" readonly>
                <span id="totalFare" style="display: none;">0</span>
              </div>
              <div class="inputBox">
                <h3>Payment</h3>
                <select name="pay" style="width: -moz-available;
  padding-top: 1.25rem;padding-bottom: 1.25rem; font-size:2rem; display: flex; text-align:center;  margin-bottom: 1.5rem;">
                  <option value="select" hidden>Select</option>
                  <option value="Cash">Cash Payment</option>
                  <option value="Net Banking">Net Banking</option>
                  <option value="Card Payment">Card Payment</option>
                </select>

              </div>
              <button type="submit" class="btn" name="bookbtn" style="color: #fff;">Book</button>

        <?php
            }
          } else {
            echo "<h4>No Record Found. !</h4>";
          }
        }
        ?>

      </form>

    </div>

  </section>





  <!-- brand section  -->
  <section class="brand-container">



  </section>

  <!-- footer section  -->

  <section class="footer">

    <div class="box-container">


      <div class="box" style="padding-left: 640px;">
        <label>follow us</label>
        <a href="https://www.facebook.com/login/" class="fab fa-facebook-f"></a>
        <a href="https://www.instagram.com/accounts/login/" class="fab fa-instagram"></a>
        <a href="https://twitter.com/i/flow/login" class="fab fa-twitter"></a>
        <a href="https://www.linkedin.com/login?fromSignIn=true&trk=guest_homepage-basic_nav-header-signin" class="fab fa-linkedin"></a>

      </div>

    </div>

    <h1 class="credit"> created by: Bus India<span> </span> | &#169 2024 all rights reserved! </h1>

  </section>
















  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <!-- custom js file link  -->
  <script src="index.js"></script>

  <script>
    $(document).ready(function() {
      // Fetch and disable checkboxes based on the response
      function disableCheckboxes(disabledValues) {
        $('input[type="checkbox"]').each(function() {
          if (disabledValues.indexOf($(this).val()) !== -1) {
            $(this).prop("disabled", true);
          }
        });
      }

      // Fetch bus ID from the input field
      var busId = $("input[name='busid']").val();
      console.log("Bus ID:", busId); // Add this line for debugging

      if (!busId) {
        console.error("Error: Bus ID is not provided");
        return; // Stop further execution if busId is not provided
      }

      $.ajax({
        type: "GET",
        url: "get_disabled_values.php",
        data: {
          busid: busId
        },
        success: function(response) {
          console,
          log(response);
          var disabledValues = response.split(",");
          disableCheckboxes(disabledValues);
          console.log(disabledValues);
        },
        error: function(xhr, status, error) {
          console.error("Error fetching disabled values:", error);
        }
      });
    });
  </script>
  <script>
    // Get all checkboxes with the class 'seat-checkbox'
    var checkboxes = document.querySelectorAll(".seat-checkbox");
    var totalFareElement = document.getElementById("totalFare");
    var totalFareInput = document.getElementById("totalFareInput");

    // Function to calculate and display the total fare
    function calculateTotalFare() {
      var totalFare = 0;
      var checkedCount = 0;

      checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
          var fare = parseFloat(checkbox.getAttribute("data-fare"));
          totalFare += fare;
          checkedCount++;
        }
      });
      // Function to handle the book ticket action
      function bookTicket() {
        var checkedCount = 0;

        checkboxes.forEach(function(checkbox) {
          if (checkbox.checked) {
            checkedCount++;
          }
        });

        if (checkedCount === 0) {
          alert("Please select at least one seat.");
        } else {
          // Proceed with booking logic, e.g., redirect to another page
          window.location.href = 'ticket.php';
        }
      }

      // Check if the number of checked checkboxes exceeds 4
      if (checkedCount > 4) {
        alert("You can only select up to 4 seats.");
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = false;
        });
        totalFare = 0;
      }

      // Update the total fare in the HTML
      totalFareElement.textContent = totalFare.toFixed(2);
      totalFareInput.value = totalFare.toFixed(2);
    }

    // Add event listeners to each checkbox
    checkboxes.forEach(function(checkbox) {
      checkbox.addEventListener("change", function() {
        calculateTotalFare();
      });
    });

    // Calculate and display the initial total fare
    calculateTotalFare();
  </script>

</body>
<script src="booking.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="path_to_dark-mode-toggle.js"></script>

</html>