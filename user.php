<?php
include('./admin/auth.php');
include('./admin/config/dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bus India</title>
  <link rel="icon" type="image/x-icon" href="images/output-onlinepngtools (1)" <!-- swiper css link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <!-- custom css file link  -->
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="mode_bot.css">


  <style>
    body {
      font-family: Arial;
      margin: 0;
    }

    * {
      box-sizing: border-box;
    }

    img {
      vertical-align: middle;
    }

    /* Position the image container (needed to position the left and right arrows) */
    .container {
      position: relative;
    }

    /* Hide the images by default */
    .mySlides {
      display: none;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor {
      cursor: pointer;
    }

    /* Next & previous buttons */
    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 40%;
      width: auto;
      padding: 16px;
      margin-top: -50px;
      color: white;
      font-weight: bold;
      font-size: 20px;
      border-radius: 0 3px 3px 0;
      user-select: none;
      -webkit-user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* Container for image text */
    .caption-container {
      text-align: center;
      background-color: #fefefe;
      padding: 2px 16px;
      color: white;
    }

    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Six columns side by side */
    .column {
      float: left;
      width: 16.66%;
    }

    /* Add a transparency effect for thumnbail images */
    .demo {
      opacity: 0.6;
    }

    .active,
    .demo:hover {
      opacity: 1;
    }
  </style>

  <style>
    /* Apply styles to the chatbot iframe to make it float */
    iframe#chatbot {
      position: fixed;
      bottom: 20px;
      right: 20px;
      border: none;
      width: 350px;
      /* Adjust the width as needed */
      height: 600px;
      /* Adjust the height as needed */
      z-index: 999;
      /* Ensure the chatbot appears above other content */
    }

    /* Light Mode Styles */
    body {
      background-color: #ffffff;
      color: #000000;
      transition: background-color 0.3s, color 0.3s;
    }

    /* Dark Mode Styles */
    body.dark-mode {
      background-color: #000000;
      color: #ffffff;
    }

    #dark-mode-toggle {
      margin-top: 20px;
      cursor: pointer;
    }
  </style>

</head>

<body>

  <!-- header section starts  -->

  <header>

    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="#" class="logo"><span>B</span>us India</a>

    <nav class="navbar">

      <a href="#home"> Home</a>
      <a href="#book">Search</a>
      <a href="#services">services</a>
      <a href="#gallery">Gallery</a>
      <a href="#review">About Us</a>
      <a href="#contact">Contact Us</a>
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
      <a id="dark-mode-toggle"><i id="mode-icon" class="fas fa-sun"></i></a>
    </nav>






  </header>




  <h2 style="text-align:center"></h2>

  <div class="coverer">
    <div class="mySlides">
      <div class="numbertext">1 / 6</div>
      <img src="images1/home-slide-100.jpg" style="width:100%;height: 700px; object-fit:cover">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 6</div>
      <img src="images1/home-slide-1.jpg" style="width:100%;height: 700px; object-fit:cover">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 6</div>
      <img src="images1/home-slide-14.jpg" style="width:100%;height: 700px; object-fit:cover">
    </div>

    <div class="mySlides">
      <div class="numbertext">4 / 6</div>
      <img src="images1/home-slide-44.jpg" style="width:100%;height: 700px; object-fit:cover">
    </div>

    <div class="mySlides">
      <div class="numbertext">5 / 6</div>
      <img src="images1/home-slide-5.jpg" style="width:100%;height: 700px; object-fit:cover">
    </div>

    <div class="mySlides">
      <div class="numbertext">6 / 6</div>
      <img src="images1/home-slide-13.jpg" style="width:100%;height: 700px; object-fit:cover">
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>


    <p id=""></p>


    <div class="row">
      <div class="column">
        <img class="demo cursor" src="images1/home-slide-100.jpg" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
      </div>
      <div class="column">
        <img class="demo cursor" src="images1/home-slide-1.jpg" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
      </div>
      <div class="column">
        <img class="demo cursor" src="images1/home-slide-14.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
      </div>
      <div class="column">
        <img class="demo cursor" src="images1/home-slide-44.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
      </div>
      <div class="column">
        <img class="demo cursor" src="images1/home-slide-5.jpg" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
      </div>
      <div class="column">
        <img class="demo cursor" src="images1/home-slide-13.jpg" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
      </div>
    </div>
  </div>
  <div class="caption-coverer">
    <p id=""></p>
  </div>



  <!-- home section ends -->


  <!-- book section starts  -->

  <section class="book" id="book">

    <h1 class="heading">
      <span>S</span>
      <span>E</span>
      <span>A</span>
      <span>R</span>
      <span>C</span>
      <span>H</span>
      <span class="space"></span>
      <span>B</span>
      <span>U</span>
      <span>S</span>
      <span>E</span>
      <span>S</span>
    </h1>

    <div class="row">

      <div class="image">
        <img src="images/book-img.png" alt="">
      </div>

      <form action="searchcode.php" method="post">

        <div class="inputBox">
          <h3>Source</h3>
          <input type="text" name="form" placeholder="from" required>
        </div>
        <div class="inputBox">
          <h3>Destination</h3>
          <input type="text" name="to" placeholder="to" required>
        </div>
        <div class="inputBox">
          <h3 for="datePicker">Travel Date</h3>
          <input type="text" id="datePicker" name="date" placeholder="Select a date" required>
        </div>
        <input type="submit" class="btn" name="search_btn" value="Search Buses">
      </form>

    </div>

  </section>

  <!-- book section ends -->



  <!-- services section starts  -->

  <section class="services" id="services">

    <h1 class="heading">
      <span>s</span>
      <span>e</span>
      <span>r</span>
      <span>v</span>
      <span>i</span>
      <span>c</span>
      <span>e</span>
      <span>s</span>
    </h1>

    <div class="box-container">



      <div class="box">
        <i class="fas fa-bullhorn"></i>
        <h3>safty guide</h3>
        <p>With Safety+ we have brought in a set of measures like Sanitized buses, mandatory masks etc. to ensure you travel safely. </p>
      </div>
      <div class="box">
        <img src="images/c.png"></img>
        <h3>around the India</h3>
        <p>We take care of your travel beyond ticketing by providing you with innovative and unique benefits. !</p>
      </div>
      <div class="box">
        <i class="fas fa-utensils"></i>
        <h3>Customer Care</h3>
        <p>We put our experience and relationships to good use and are available to solve your travel issues. !</p>
      </div>


    </div>

  </section>

  <!-- services section ends -->

  <!-- gallery section starts  -->

  <section class="gallery" id="gallery">

    <h1 class="heading">
      <span>g</span>
      <span>a</span>
      <span>l</span>
      <span>l</span>
      <span>e</span>
      <span>r</span>
      <span>y</span>
    </h1>

    <div class="box-container">

      <div class="box">
        <img src="images/g-11.jpg" alt="">
        <div class="content">
          <h3>Somnath-Temple-Gujarat</h3>


        </div>
      </div>
      <div class="box">
        <img src="images/g-12.jpg" alt="">
        <div class="content">
          <h3>Saputara-Hill-Sation-Gujarat</h3>

        </div>
      </div>
      <div class="box">
        <img src="images/g-13.jpg" alt="">
        <div class="content">
          <h3>Gir-National-Park-Asiatic-lion</h3>

        </div>
      </div>
      <div class="box">
        <img src="images/g-14.jpg" alt="">
        <div class="content">
          <h3>Statue-of-Unity-Gujarat</h3>

        </div>
      </div>
      <div class="box">
        <img src="images/g-15.jpg" alt="">
        <div class="content">
          <h3>Great-Rann-of-Kutch-Gujarat</h3>

        </div>
      </div>
      <div class="box">
        <img src="images/g-16.jpg" alt="">
        <div class="content">
          <h3>Rani-Ki-Vav-Gujarat</h3>

        </div>
      </div>
      <div class="box">
        <img src="images/g-17.jpg" alt="">
        <div class="content">
          <h3>Udvada-Gujarat</h3>

        </div>
      </div>
      <div class="box">
        <img src="images/g-18.jpg" alt="">
        <div class="content">
          <h3>Laxmi-Vilas-Palace-Gujarat</h3>

        </div>
      </div>
      <div class="box">
        <img src="images/g-19.jpg" alt="">
        <div class="content">
          <h3>Balasinor-Dinosaur-Museum</h3>

        </div>
      </div>

    </div>

  </section>

  <!-- gallery section ends -->

  <!-- review section starts  -->

  <section class="review" id="review">

    <h1 class="heading">
      <span>A</span>
      <span>B</span>
      <span>O</span>
      <span>U</span>
      <span>T</span>
      <span class="space"></span>
      <span>U</span>
      <span>S</span>
    </h1>


    <div>

      <h4>Wanna know were it all started?</h4>
      <p style="padding: 5rem 5rem;line-height: 3rem;">
        Lorem ipsum dolor sit amet consecteturadipisicing elit. Perferendis soluta voluptas eaque, numquam veritatis aperiam expedita deleniti, nesciunt cum alias velit. Cupiditate commodi
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus cum nisi ea optio unde aliquam quia reprehenderit atque eum tenetur!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed placeat debitis corporis voluptates modi quibusdam quidem voluptatibus illum, maiores sequi.
      </p>
    </div>
  </section>

  <!-- review section ends -->



  <!-- brand section  -->
  <section class="brand-container">



  </section>
  <section class="contact" id="contact">

    <h1 class="heading">
      <span>c</span>
      <span>o</span>
      <span>n</span>
      <span>t</span>
      <span>a</span>
      <span>c</span>
      <span>t</span>
    </h1>

    <div class="row">

      <div class="image">
        <img src="images/112.jpg" alt="">
      </div>

      <form action="message.php" method="post">
        <div class="inputBox">
          <input type="text" name="name" placeholder="name">
          <input type="email" placeholder="email" name="email">
        </div>
        <div class="inputBox">
          <input type="text" placeholder="number" name="number">
          <input type="text" placeholder="subject" name="subject">
        </div>
        <textarea name="message" placeholder="message" id="" cols="30" rows="10"></textarea>
        <input type="submit" class="btn" name="sendbtn" value="send message">
      </form>

    </div>

  </section>


  <!-- footer section  -->

  <section class="footer" id="footer">

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









  <script>
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    const body = document.body;
    const modeIcon = document.getElementById('mode-icon');

    // Check if the user has a preference stored
    const userPreference = localStorage.getItem('theme');

    // If the user has a preference, apply it
    if (userPreference === 'dark') {
      body.classList.add('dark-mode');
      modeIcon.classList.remove('fa-sun');
      modeIcon.classList.add('fa-moon');
    }

    // Toggle between modes and update the icon
    darkModeToggle.addEventListener('click', () => {
      body.classList.toggle('dark-mode');
      const currentTheme = body.classList.contains('dark-mode') ? 'dark' : 'light';
      localStorage.setItem('theme', currentTheme);

      // Update the icon
      if (currentTheme === 'dark') {
        modeIcon.classList.remove('fa-sun');
        modeIcon.classList.add('fa-moon');
      } else {
        modeIcon.classList.remove('fa-moon');
        modeIcon.classList.add('fa-sun');
      }
    });
  </script>

  <script>
    // Initialize Flatpickr for the date picker input
    flatpickr("#datePicker", {
      dateFormat: "Y-m-d", // Set the desired date format
      minDate: "today", // Allow selecting dates starting from today
    });
  </script>





  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <!-- custom js file link  -->
  <script src="index.js"></script>
  <iframe id="chatbot" src="chatbot.php" frameborder="0" width="100%" height="600"></iframe>



  <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("demo");
      let captionText = document.getElementById("caption");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      captionText.innerHTML = dots[slideIndex - 1].alt;
    }
  </script>



  <!-- custom js file link  -->
  <script src="index.js"></script>
  <script src="path_to_dark-mode-toggle.js"></script>

</body>

</html>