
<?php include 'partials/header.view.php' ?>
<?php 
if(isset($_SESSION['error'])){ $_SESSION['error'] = array();};
?>

<title>HOME</title>

<body>
<section class="home">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 container-section">
        <h1 class="title-section">CATÁLOGO</h1>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row linea-books">
  <?php 
  foreach($data as $catalogo):
    foreach($catalogo as $obj): ?>       
      <div class="col-3 container-libro">
            <img src="<?php echo($obj->link); ?>" alt="libro_1" class="img-fluid">
            <p class="title-book"><strong><?php echo($obj->titulo); ?></strong></p>
            <p class="author-book">Autor: <?php echo($obj->autor); ?></p>
            <p class="isbn-book">ISBN: <?php echo($obj->isbn); ?></p>
            <button type="button" onclick="prestamoFunc(this)" data-id="<?php echo($obj->idlibro); ?>" class="btn btn-primary btn-lg btn-block button-book">Añadir al carrito</button>
      </div>
    <?php endforeach;
  endforeach;
  ?>
        </div>
      </div>
</section>

<?php include 'partials/footer.view.php' ?>
</body>
<script>
  function prestamoFunc(isbnLibro) {
  var idLibroData = isbnLibro.getAttribute("data-id");
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();
  today = yyyy + '-' + mm + '-' + dd ;
  // alert(isbnLibroData);
    $.ajax({
       url: '/book/',
       type: 'POST',
       data: {idLibroData : idLibroData, today : today},
       success: function(response) {
         var jsonData = JSON.parse(response);
            if (jsonData.success == "1"){
              alert("El prestamo se ha realizado");
              $(isbnLibro).css("background-color", "red");
              $(isbnLibro).prop("disabled", true);
            }else{
              alert("No se ha podido realizar el prestamo");
            }
       }
    });

  }
  
</script>
</html>