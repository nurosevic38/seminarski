<style>
  ul li:hover {
    background-color: #91574d;
  }

  a:active {
    background-color: rgb(3, 26, 64);
  }
  
  body
  {	  
	  background-color: #c09379;
  }
  
  .btn-custom-one:hover {
	background-color: rgb(3, 26, 64);
	text-decoration: none;
	color: #fff;
}

	.btn-custom-one {
	background-color: transparent;
	color: #fff;
	border: 2px solid rgb(3, 26, 64);
	}
	
	
</style>
	

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: transparent; ">
    <a href="#" class="navbar-brand">
        <img src="avion.png" width="30" height="30" class="d-inline-block align-top">              
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">POČETNA <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="onama.php">O NAMA</a>
      </li>
<?php
  if(!empty($_SESSION['user'])){
    ?>
    <li class="nav-item">
        <a class="nav-link" href="rezervisi.php">REZERVIŠI</a>
      </li>
    <?php
    if($_SESSION['user']['admin']){
      ?>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ADMIN
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="dodajlet.php">DODAJ LET</a>
          <a class="dropdown-item" href="pregledRez.php">PREGLED REZERVACIJA</a>
          <a class="dropdown-item" href="izmeniCenu.php">IZMENA CENE</a>
        </div>
      </li>
      <?php
    }
    ?>
     <li class="nav-item">
        <a class="nav-link" href="logout.php">ODJAVA</a>
      </li>
    <?php
  }else{
    ?>
    <li class="nav-item">
        <a class="nav-link" href="register.php">REGISTRACIJA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">PRIJAVI SE</a>
      </li>
    <?php
  }
 ?>

</ul>
  </div>
</nav>

