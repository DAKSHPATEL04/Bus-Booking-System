<?php
include('../admin/auth.php');
include('../admin/config/dbcon.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<link rel="stylesheet" href="../ticket.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <title>Bus India | Profile</title>
</head>
<body style="font-size: 18.5px;">
    
<!-- header section starts  -->

<header style="padding: 0rem 9%;">

    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="../user.php" class="logo"><span>B</span>US INDIA</a>

    <nav class="navbar" style="padding-top: 20px;">
    <a href="../user.php" > Home</a>
               
                <a href="../ticket.php" >Ticket</a>
                <a href="profile.php" >
            
                <?php 
                if(isset($_SESSION['auth']))
                {
                echo $_SESSION['auth_user']['user_name']; 
                }
                else{
                echo "not logged in";
                }
                ?></a>
            
            <a href="../logout.php" >Logout</a>
    </nav>

   
</header>

<!-- header section ends -->

<!-- login form container  -->



<!-- home section starts  -->



<!-- home section ends -->

<!-- book section starts  -->


<main class="ticket-system" style="padding-top: 68px;">
   <?php
                                       if(isset($_GET['t_id']))
                                       {
                                       $user_id = $_GET['t_id'];
                                       $query= "SELECT * FROM ticket WHERE id='$user_id'";
                                       $query_run = mysqli_query($con, $query);
                                       if(mysqli_num_rows ($query_run) > 0)
                                       {
                                       foreach($query_run as $row)
                                       {
                                                ?>
      
    

       <div class="top">
   <h1 class="title"><b>Ticket Printing</b></h1>
   <div class="printer" style=" border: 5px solid #000;"/>
   </div>
   <div class="receipts-wrapper">
      <div class="receipts" id="printableArea">
        
         <div class="receipt">
         <h2 style="text-align: center"><i class="fa fa-bus"> Bus India</i></h2>
         
            
            <div class="route" style="font-size: 0.7em;">
               <h2 name="departure"><?php echo $row['departure']; ?></h2>
                  <i class="fas fa-arrow-right"></i>
               <h2 name="arrival"><?php echo $row['arrival']; ?></h2>
            </div>
            <div class="details">
               <div class="item">
                  <span>Passanger</span>
                  <h3 name="pname"><?php echo $row['pname']; ?></h3>
               </div>
               <div class="item">
                  <span>Bus Name</span>
                  <h3 name="busname"><?php echo $row['busname']; ?><h3>
               </div>
               <div class="item">
                  <span>Bus No</span>
                  <h3 name="busno"><?php echo $row['busnumber']; ?></h3>
               </div>
               <div class="item">
                 <span>Departure At</span>
                  <h3 name="duration"><?php echo $row['duration']; ?></h3>
               </div>
               <div class="item">
                 <span>No of Seats</span>
                  <h3 name="seats"><?php echo $row['seat']; ?><h3>
               </div>
               <div class="item">
                 <span>Fare</span>
                 <h3 name="">₹<?php echo $row['fare']; ?></h3>
               </div>
          
                                                                   
                                                                   <div class="item">
                                                                   <span>Date</span>
               <h3><?php echo $row['date']; ?></h3>
                                                               </div>
            </div>
         </div>
         
         <?php
                                                                }
                                                                }
                                                                else
                                                                {
                                                                echo "<h4>No Record Found. !</h4>";
                                                                }
                                                                }
                                                                 ?>
      </div>
      <div class="description">
               <a href="../user.php" class="btn btn-primary btn-sm float-right" style="border-radius: 50px;right: 5rem;position: relative;top: 1rem;">OK</a>
                 
                                                                
      <input type="button"  class="btn btn-primary btn-sm float-right" onclick="printDiv('printableArea')" value="Download" style="border-radius: 50px;left: 5rem;position: relative;top: 1rem;"/>
   </div>
  
         
</main>




<!-- book section ends -->

<!-- packages section starts  -->



<!-- packages section ends -->

<!-- services section starts  -->


<!-- services section ends -->

<!-- gallery section starts  -->



<!-- gallery section ends -->

<!-- review section starts  -->



<!-- review section ends -->

<!-- contact section starts  -->



<!-- contact section ends -->

<!-- brand section  -->


<!-- footer section  -->















<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
  </script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>