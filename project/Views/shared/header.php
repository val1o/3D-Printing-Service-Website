<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- If $css is set, apply the corresponding stylesheet -->
    <?php
      if(isset($css)) {
        echo '<link rel="stylesheet" href="Styles/' . $css . '.css">';
      }
    ?>
    <link rel="stylesheet" href="Styles/header.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
    <!-- If $js is set, apply the corresponding script -->
    <?php
      if(isset($js)) {
        echo '<script src="Javascript/' . $js . '.js"></script>';
      }
    ?>

    <?php
      if(isset($title)) {
        echo "<title>" . $title . "</title>";
      } else {
        echo "<title>Document</title>";
      }
    ?>
    
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
      <?php
        if(!isset($_SESSION["uID"]) & $title == "Home Page") {
          echo '
            <div id="overlay">
            <img id="overlayImage" src="Images/3dprint_welcome.svg" alt="Overlay Image" />
            <div id="textOverlay">Welcome</div>
            </div>
            ';
        } ?>

  <div id="content" class="<?php if(!isset($_SESSION["uID"])) echo 'hidden '; ?>revealContent">
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">3D Printing Montreal</label>
      <ul>
        <li><a <?php if($title == "Home Page") echo 'class="active" '; ?>href="index.php?c=Home&a=home">Home</a></li>
        <li><a href="#">Service</a></li>

        <?php
        if(isset($_SESSION['uID'])){
          //If user is logged in, navbar shows Profile and Logout
          echo '<li><a' . ($title == "Profile Page" ? ' class="active"' : '') . ' href="index.php?c=User&a=profile">Profile</a></li>';
          echo '<li><a' . ($title == "Logout Page" ? ' class="active"' : '') . ' href="index.php?c=User&a=logout">Logout</a></li>';
          $user = new User();
          $user = $user->getUserByuID($_SESSION['uID']);
          if($user['isAdmin']) {
            //If user is admin, navbar shows Management
            echo '<li><a' . ($title == "Management" ? ' class="active"' : '') . ' href="index.php?c=User&a=viewAllUsers">Manage</a></li>';
          }
        } else {
          //If user is NOT logged in, navbar shows Login and Register
          echo '<li><a' . ($title == "Login Page" ? ' class="active"' : '') . ' href="index.php?c=User&a=login">Login</a></li>';
          echo '<li><a' . ($title == "Register Page" ? ' class="active"' : '') . ' href="index.php?c=User&a=register">Register</a></li>';
        }
          
        ?>
      </ul>
    </nav>