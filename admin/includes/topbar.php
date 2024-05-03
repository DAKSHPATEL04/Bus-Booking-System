<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Panel</title>
</head>
<body>
<div class="container">
<div class="header">
            <div class="nav">
               
            <div class="menu-bar">
            <div class="dropdown" style="margin-left: 1180px;">
            <li><a href="#"></a> <img src="image/user.png" style="width: 50px;"  onclick="myFunction()" class="dropbtn"></i></a>
  <div id="myDropdown" class="dropdown-content">
  <button ><a href="admininfo.php" name="proflie_btn" class="btn btn-info">Profile</a></button>
    
    <form action="admincode.php" method="POST">
              <button type="submit" name="logout_btn" class="btn btn-info">Logout</button>
            
  </div>
  </form>
            </li>
</div>

    </div>

            </div>
           
        </div>
</div>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>
</html>
