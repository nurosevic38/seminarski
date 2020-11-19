<?php

    include("init.php");
    require('letClass.php');
    $msg = '';
    $msg_class = '';


     if(isset($_POST['unosLeta'])) {

     		$let = new Let($mysqli);
     		$let->unosLeta(trim($_POST['gradOd']),trim($_POST['gradDo']),trim($_POST['type']),trim($_POST['cena']));
         if($let->getResult()){
           $msg="Uspesno unet novi let ";
           $msg_class = "alert-success";
         }else{
           $msg="Neuspesno unosenje novog leta ";
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
      
            <h1>Unos novog leta</h1>
            <hr />
            <?php
              if($msg != ''): ?>
                  <div class="alert <?php echo $msg_class ?>" role="alert">
                  <?php echo $msg?>
                  
                  </div>
              <?php endif;?>

       
                    <!-- Unos novog leta -->

                      <form name="unosLeta" method="post" action="">
                          <div class="form-group">
                              <label for="naziv" class="cols-sm-2 control-label">Grad polaska</label>                               
                                    <input type="text" class="form-control" name="gradOd" id="gradOd"  placeholder="mesto polaska"/>
                            </div>
                            <div class="form-group">
                              <label for="drzava" class="cols-sm-2 control-label">Grad dolaska</label>                               
                                    <input type="text" class="form-control" name="gradDo" id="gradDo"  placeholder="mesto dolaska"/>
                            </div>
						
                     <div class="form-group">
                        <label for="type" class="cols-sm-2 control-label">Klasa</label>               
                              <select class="form-control" name="type" >
                                <?php
                                    $let = new Let($mysqli);
                                    $let->sveKlase();
                                    $result = $let->getResult();

                                    foreach ($result as $red ) {
                       			            $id = $red['idKlase'];
                       			            $tip = $red['nazivKlase'];
										
                                        ?>
                                        <option value="<?php echo $id;?>"><?php echo $tip;?></option>
                                        <?php
                                       }
                                       ?>
                              </select>
                      </div>
					 <div class="form-group">
                              <label for="drzava" class="cols-sm-2 control-label">Cena karte</label>                               
                                    <input type="text" class="form-control" name="cena" id="cena"  placeholder="cena karte"/>
                            </div>
                            
                            <div class="form-group ">
                              <input type="submit" name="unosLeta" class="btn btn-danger btn-lg " value="Dodaj let">
                            </div>
                          </form>
                          <br>
                          <hr>
                          
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

		function search(){

			var event = $("#letSearch").val();
			$.ajax({
				url: "generisiPodatkeSearch.php",
				data: "id="+event,
				success: function(result){
				var text = '<table class="table"><thead><tr><th>Broj rezervacije</th><th>Relacija</th><th>Korisnik</th><th>Datum rezervacije</th><th>Cena karte</th><th>Broj sedista</th><th>Brisanje</th></tr></thead><tbody>';
				$.each($.parseJSON(result), function(i, val) {
					text += '<tr>';
					text += '<td>'+val.rezervacijaID+'</td>';
					text += '<td>'+val.mestoOd+'-'+val.mestoDo+'</td>';
					text += '<td>'+val.name+'</td>';
					text += '<td>'+val.datum+'</td>';
				//	text += '<td>'+nazivKlase+'</td>';
					text += '<td>'+val.cena+'</td>';
					text += '<td>'+val.brojSedista+'</td>';
					text += '<td><a href="obrisi.php?id='+val.rezervacijaID+'">Obrisi</a></td>';
					text += '</tr>';

					});

					text+='</tbody></table>';
					$('#tabela').html(text);
			}});
		}


</script>
<script>
		$( document ).ready(function() {
			search();
		});
</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
  
</body>

</html>
