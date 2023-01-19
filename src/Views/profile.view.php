
<?php include 'partials/header.view.php' ?>
<?php 
// var_dump($data['usuariosQuery']);


?>
<title>Perfil</title>

<body class="body">
<section class="home">
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
<!--       <button type="button" onclick="updateUserBtn()">Update User</button> -->
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
  function updateUserBtn() {
    $('#updateUserForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'ProfileController.php?action=updateDatosUser',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                // user is logged in successfully in the back-end 
                // let's redirect 
                if (jsonData.success == "1")
                {
                    location.href = 'my_profile.php';
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           }
       });
     });
  }
</script>
</html>