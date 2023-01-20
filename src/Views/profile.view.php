
<?php include 'partials/header.view.php' ?>

<title>Perfil</title>

<body class="body">
<section class="home">

<div class='outer'>
<table class=" tftable table table-hover bg-light">
    <thead>
        <tr>
            <th>ISBN</th>
            <th>TITULO</th>
            <th>AUTOR</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['prestados'] as $user) : ?>
            <tr>
                <td><?= $user->isbn ?></td>
                <td><?= $user->titulo ?></td>
                <td><?= $user->autor ?></td>
                <td><button onclick="quitarPrestamo(this)" type="submit" class="btn btn-primary" data-id="<?= $user->idlibro ?>">Devolver</button></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
  
 <div class="container-section-register">
  <h1 class="title-principal">Datos de Perfil</h1>
 </div>
 <div class="container-fluid">
  <div class="row justify-content-center container-all">
    <div class="col-3 container-auth">
      <div class="container-form">
        <form id="updateUserForm" action="/profile/updateDatosUser" method="POST" class="form-register">
    <div class="container-section-register">
      <div class="container-input">
        Username:<input type="text" name="usuarioInput" id="usuInp"  class="input-profile" value=<?php echo $data['usuariosQuery']['usuario']; ?>>
      </div>
      <div class="container-input">
        Nombre: <input type="text" name="nombreInput" id="nomInp" class="input-profile" value=<?php echo $data['usuariosQuery']['nombre']; ?>>
      </div>
      <div class="container-input">
        Apellidos:<input type="text" name="apellidosInput" id="apellInp" class="input-profile" value=<?php echo $data['usuariosQuery']['apellidos']; ?>>
      </div>
      <div class="container-input">
        Telefono: <input type="text" name="telefonoInput" id="telfInp" class="input-profile" value=<?php echo $data['usuariosQuery']['telefono']; ?>>
      </div>
      <div class="container-button-form">
        <button type="submit" class="button">Update</button>
      </div>
    </div>
  </form>
      </div>
    </div>
  </div>
 </div>
</section>


<?php include 'partials/footer.view.php' ?>
</body>
<!-- <script type="text/javascript" src="updateDatosCliente.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/JavaScript">

  function quitarPrestamo(prestamoData) {
    var prestamoDataId = prestamoData.getAttribute("data-id");
    $.ajax({
       url: '/profile/deletePrestado',
       type: 'POST',
       data: {prestamoDataId : prestamoDataId},
       success: function(response) {
         location.reload();
    
       }
    });
  }

  
</script>
</html>