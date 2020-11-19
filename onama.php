<?php

    include("init.php");
 ?>

<!DOCTYPE html>
<html lang="en" class="no-js" >
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />

<title>Najpovoljniji Letovi</title>
<!-- <link href="assets/css/bootstrap.css" rel="stylesheet" /> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link href="assets/css/ionicons.css" rel="stylesheet" />
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<link href="assets/js/source/jquery.fancybox.css" rel="stylesheet" />
<link href="assets/css/animations.min.css" rel="stylesheet" />
<link href="assets/css/style-solid-black.css" rel="stylesheet" />
<link rel="shortcut icon" href="avion.png">
</head>
<body data-spy="scroll" data-target="#menu-section">

<div class="navbar-inverse  scroll-me" id="menu-section" >
<?php include("meni.php") ?>
</div>



<div class="jumbotron" style="background-image:url(assets/img/airport.jpg); height:450px">
<div class="container text-center">
  <h1 class="display-4" style="text-shadow: 2px 2px #91574d;">Najpovoljniji letovi</h1>
  <hr>
  <p class="lead" style="text-shadow: 2px 2px black; background:#c09379; opacity:0.8;">Najposećeniji sajt u Srbiji za rezervaciju avionskih karata!</p>
  <hr class="my-4">
  <p style="color:#91574d; text-shadow: 0.5px 0.5px black;">Vaš pouzdan parter od 2009. godine.</p>
  <p class="lead">
    <a class="btn btn-lg" style="background:#c09379; color:white" href="#anchor" role="button">Galerija</a>
  </p>
  </div>
</div>




<!-- Glavna sekcija -->
<section>
    <div class="container text-center">
            <h1><a id="anchor"></a>Galerija</h1>
            <hr />

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="services-wrapper">
                <div class="row text-center animate-in" data-anim-type="fade-in-up" id="work-div">
                  <?php

                      $files = glob("assets/galerija/*.*");
                      //var_dump($files);
                      foreach ($files as $file) {
                        ?>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6 html">
                              <div class="work-wrapper">

                                <a class="fancybox-media" title="Najpovoljniji letovi" href="<?php echo $file; ?>">

                                  <img src="<?php echo $file; ?>" class="img-fluid img-rounded" alt="" />
                                </a>
                              </div>
                          </div>

                        <?php
                      }
                   ?>

                </div>








<?php
    include("footer.php");

 ?>


<script src="assets/js/jquery-1.11.1.js"></script>
<!-- <script src="assets/js/bootstrap.js"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="assets/js/vegas/jquery.vegas.min.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/source/jquery.fancybox.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/appear.min.js"></script>
<script src="assets/js/animations.min.js"></script>
<script src="assets/js/custom-solid.js"></script>
</body>

</html>

