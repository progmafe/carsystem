 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <nav class="navbar navbar-expand-sm navbar-dark bg-dark justify-content-between">
		<a class="navbar-brand"  href="home.php">Home</a>
		<ul class="navbar-nav">
			<li class="nav-item">
			<a class="nav-link" href="sobre.php">Sobre </a>
			</li>
		</ul>
		<ul  class="navbar-nav">
			<li class="nav-item">
			<a class="nav-link" href="carros.php">Carros</a>
			</li>
		</ul>
		<ul  class="navbar-nav">
			<li class="nav-item">
			<a class="nav-link" href="contatos.php">Contatos</a>
			</li> 				
		</ul>			
		<ul  class="navbar-nav ">
			<li class="nav-item">
			<a class="nav-link" href="logout.php">Logout</a>
			</li>  
		</ul> 
	</nav> 

 <div class="container">
</br>
	<h5 style="color:#FFFFFF"><?php
	require('logado.php');
	echo "Olá! Seja Bem Vindo ".$_SESSION['usuario']['nome'];
	?><h5>

 <style>
 .carousel-inner img
 {
  width: 280px;
  height: 500px;
 }
 </style>

 <body>
 <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src=".\imagem\citroen.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Citroen</h5>
        <p>Citroen, creative technology.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src=".\imagem\fiattoro.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Fiat Toro</h5>
        <p>Brutalmente lindo!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src=".\imagem\renegade.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Renegade</h5>
        <p>Tudo nele é Jeep!</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
 </div>

 <style>
body 
{
	background-color:#212529;
}
</style>

 </body>
</html>