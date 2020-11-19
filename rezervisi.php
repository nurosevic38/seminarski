<?php

    include("init.php");
    require('letClass.php');
    $msg = '';
    $msg_class = '';


    if(isset($_POST['rezervisi'])) {

    		$let = new Let($mysqli);
    		$let->rezervacija(trim($_POST['datum']),trim($_POST['let']),trim($_POST['brojSedista']));
        if($let->getResult()){
          $msg="Uspesno rezervisano";
          $msg_class = "alert-success";
        }else{
          $msg="Neuspesna rezervacija ! Broj sedista mora biti u opsegu 0-60";
          $msg_class = "alert-danger";
        }
     }
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
<link href="assets/css/jquery-ui.css" rel="stylesheet" />
<link rel="shortcut icon" href="avion.png">
</head>
<body data-spy="scroll" data-target="#menu-section">

<div class="navbar-inverse  scroll-me" id="menu-section" >
<?php include("meni.php") ?>
</div>

<!-- Glavna sekcija -->
<section>
    <div class="container text-center">
            <h1>Kreirajte novu rezervaciju</h1>
            <hr />
            <?php
              if($msg != ''): ?>
                  <div class="alert <?php echo $msg_class ?>" role="alert">
                  <?php echo $msg?>
                  
                  </div>
              <?php endif;?>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="services-wrapper">
              <form name="rezervacija" method="post" action="">
                  <div class="form-group">
                      <label for="let" class="cols-sm-2 control-label"> Relacije </label>                       
                            <select class="form-control" name="let" >
                              <?php
                                  $let = new Let($mysqli);
                                  $let->sviLetovi();
                                  $result = $let->getResult();

                                  foreach ($result as $red ) {
                     			            $id = $red['id'];
                     			            $mestoOd = $red['mestoOd'];
											$mestoDo = $red['mestoDo'];
											
                                      ?>
                                      <option value="<?php echo $id;?>"><?php echo $mestoOd.' - '.$mestoDo;?></option>
                                      <?php
                                     }
                                     ?>
                            </select>					
                    </div>
				

                    <div class="form-group">
                      <label for="date" class="cols-sm-2 control-label">Datum</label>                       
                            <input id="datepicker" type="text" class="form-control" name="datum" id="datum"  placeholder="Datum"/>
                          </div>
					 <div class="form-group">
                              <label for="drzava" class="cols-sm-2 control-label">Broj sedista</label>                               
                                    <input type="text" class="form-control" name="brojSedista" id="brojSedista"  placeholder="Broj sedista [0-60]"/>
                                  </div>
                    <div class="form-group ">
                      <input type="submit" name="rezervisi" class="btn btn-danger btn-lg " value="Rezervisi">
                    </div>
                  </form>

            </div>
          </div>
        </div>

</section>



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
<script src="assets/js/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
</body>

</html>
