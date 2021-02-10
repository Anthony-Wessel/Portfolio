<?php
session_start();
if (isset($_GET["item"]))
  $_SESSION["item"] = $_GET["item"];

include("dynamicCard.php");
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">

    <script src="Bootstrap/js/jquery-3.3.1.min.js"></script>
    <script src="Bootstrap/js/popper.min.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>

    <title>Anthony's Portfolio</title>

  </head>
  <body style= "width: 100%">
      <!-- Header -->
      <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #111111">
          <a class="navbar-brand ps-2" href="index.php">
              <img src="Images/Logo.png" width="30" height="30"/>
              Anthony Wessel
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="about.php">About Me</a>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="aboutWebsite.php">About This Site</a>
                  </li>
              </ul>

              <ul class="navbar-nav pe-2">
                  <li class="nav-item active">
                      <a class="nav-link" href="prototypes.php">Prototypes</a>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="vfx.php">VFX</a>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="art.php">Art</a>
                  </li>
              </ul>
          </div>
      </nav>
      <!-- END Header -->

      <div class="row ms-0" style="background-color:#333333; min-height: 95vh; width:100%">

          <!-- Placeholder -->
          <div class="col-md-9 col-lg-10" id="content">
            <br>
            <?php include($content) ?>
          </div>
          <!-- END Placeholder -->

          <!-- Sidebar -->
          <div class="col-md-3 col-lg-2" style="background-color: #222222" id="sidebar">
            <?php
              $directories = scandir("Content");

              foreach($directories as $directory)
              {
                if (strlen($directory) < 3) continue;

                $files = scandir("Content/" . $directory);
                $count = count($files);

                $first = rand(2, $count-1);
                $second = rand(2, $count-1);
                while($second == $first)
                {
                  $second = rand(2, $count-1);
                }

                echo CreateSummaryCard("Content/" . $directory . "/" . $files[$first]);
                echo CreateSummaryCard("Content/" . $directory . "/" . $files[$second]);
              }
              echo "<br>";
            ?>
          </div>
          <!-- END Sidebar -->
      </div>

      <!-- Footer -->
      <div class="row ms-0" style="width: 100%; background-color: #111111; color: #888888">
        <div class="col">
          <?php echo "_" ?>
        </div>
      </div>
      <!-- END Footer -->
  </body>
</html>
