
<?php include 'partials/header.view.php' ?>
<?php 
if(isset($_SESSION['error'])){ $_SESSION['error'] = array();};
?>

<title>HOME</title>

<body>
<section class="home">
  <div class="container-fluid">
    <div class="row banner-home">
      <div class="col-12">
        <img src="public/img/bannerlargo-libros.png" alt="banner-home" class="img-fluid banner-home">
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row container-top-three">
      <div class="col-4"></div>
      <div class="col-4"></div>
      <div class="col-4"></div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row container-valoracion">
      <div class="col-6 valoracion">
        <div class="container-valoration">
          <h4 class="valoration-name">Raúl Fernandez</h4>
          <p class="valoration-text">“Me encanta la página, es muy fácil de usar y los libros que he pedido me han llegado en perfecto estado. Además, el servicio de atención al cliente es muy bueno, me han ayudado en todo lo que he necesitado.”</p>
          <img src="public/img/valoracion.png" alt="valoracion" class="img-valoration">
        </div>
      </div>
      <div class="col-6 valoracion">
        <div class="container-valoration">
          <h4 class="valoration-name">Piotr Figma</h4>
          <p class="valoration-text">“Me encanta la página, es muy fácil de usar y los libros que he pedido me han llegado en perfecto estado. Además, el servicio de atención al cliente es muy bueno, me han ayudado en todo lo que he necesitado.”</p>
          <img src="public/img/valoracion.png" alt="valoracion" class="img-valoration">
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row container-top-three">
      <h3 class="title-top-three">TOP 3 RECOMENDADOS</h3>
      <?php 
        foreach($data as $valoraciones):
          foreach($valoraciones as $obj): ?>
            <div class="col-4 container-libro">
                <img src="<?php echo($obj->link); ?>" alt="libro_1" class="img-fluid">
                <p class="title-book"><?php echo($obj->titulo); ?></p>
                <p class="author-book"><strong>Autor:</strong> <?php echo($obj->autor); ?></p>
                <p class="isbn-book"><strong>ISBN:</strong> <?php echo($obj->isbn); ?></p>
            </div>
          <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
  </div>
</section>
<?php include 'partials/footer.view.php' ?>
</body>
</html>