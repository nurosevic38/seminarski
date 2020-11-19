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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
<link href="assets/css/animations.min.css" rel="stylesheet" />
<link href="assets/css/style-solid-black.css" rel="stylesheet" />
<link rel="shortcut icon" href="avion.png">
</head>
<body data-spy="scroll" data-target="#menu-section">

<div class="navbar-inverse  scroll-me" id="menu-section" >
<?php include("meni.php") ?>
</div>

<!-- Carousel -->

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="2000">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/galerija/london.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <div class="container">
						<div class="row justify-content-center">
							<div class="col-8 bg-custom d-none d-lg-block py-5 px-0">
								<h1 class="display-2" style="text-shadow: 2px 2px #91574d">Dobrodošli u svet putovanja</h1>
								<div class="border-top border-primary w-50 mx-auto my-3"></div>
									<h3 class="pb-3" style="text-shadow: 2px 2px #91574d">Pronadjite vaš let!</h3>
									<a href="#anchor" class="btn btn-light btn-lg mr-2" style="background-color: #91574d; color: white;">Svi letovi</a>
									
								
							</div>
						</div>
					</div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/galerija/paris.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <div class="container">
						<div class="row justify-content-center">
							<div class="col-8 bg-custom d-none d-lg-block py-10 px-0 my-5">
								<h1 class="display-2" style="text-shadow: 2px 2px #91574d">Otkrijte najbolje ponude</h1>
								<div class="border-top border-primary w-50 mx-auto my-3"></div>
									<h3 class="pb-3" style="text-shadow: 2px 2px #91574d">Nudimo veliki broj svetskih destinacija!</h3>
									<a href="onama.php" class="btn btn-light btn-lg mr-2" style="background-color: #91574d; color: white;">O nama</a>								
								
							</div>
						</div>
					</div>
        
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/galerija/moscow.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <div class="container">
						<div class="row justify-content-center">
							<div class="col-8 bg-custom d-none d-lg-block py-5 px-0">
								<h1 class="display-2" style="text-shadow: 2px 2px #91574d">Već dugi niz godina uz vas</h1>
								<div class="border-top border-primary w-50 mx-auto my-3"></div>
									
									<a href="onama.php" class="btn btn-light btn-lg mr-2" style="background-color: #91574d; color: white;">Galerija</a>
									
								
							</div>
						</div>
					</div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<!-- Tabela letovi -->

<div class="container text-center">

</div>

<div class="container text-center py-5">
  <br>
<h2><a id="anchor"></a>Svi dostupni letovi</h2>
 
  
 <br>

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="services-wrapper">
    <?php
        include("letClass.php");
         $let = new Let($mysqli);
        $let->sviLetovi();
        $result = $let->getResult();


	       if(count($result) >0) {
           ?>
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Mesto polaska</th>
                  <th class="text-center">Mesto dolaska</th>
                  <th class="text-center">Klasa</th>
				  <th class="text-center">Cena</th>
                </tr>
              </thead>
              <tbody>
           <?php

		         foreach ($result as $red ) {
			            $id = $red['id'];
			            $mestoOd = $red['mestoOd'];
                  $mestoDo= $red['mestoDo'];
                  $klasa= $red['nazivKlase'];
				  $cena= $red['cena'];
                  ?>
                  <tr style="color: #fff; background: #8f5d40;">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $mestoOd; ?></td>
                    <td><?php echo $mestoDo; ?></td>
                    <td><?php echo $klasa; ?></td>
					<td><?php echo $cena; ?></td>
                  </tr>


                  <?php

		         }

             ?>
           </tbody>
         </table>
             <?php
	     }else{
          ?>
          <h1> Nema rezultata u tabeli </h1>
         <?php
       }

     ?>

 
  </div>
  </div>
  </div>

</div>

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
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

<script>
     $(document).ready(function() {
            $('.table').DataTable();
        } );
    </script>
</body>

</html>
