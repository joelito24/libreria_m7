<?php include 'partials/header.view.php' ?>
<?php 
if(isset($_SESSION['error'])){ $_SESSION['error'] = array();};
?>

<title>ADMIN - USER</title>

<body>
<style type="text/css">

/* TABLA */
.tftable {font-size:12px;color:black;width:100%;border-width: 3px;border-color: black;}
.tftable th {font-size:20px;background-color:#B13333;border-width: 1px;padding: 8px;border-style: solid;border-color: black;text-align:left;text-align: left;top: 0;position: sticky;}
.tftable tr {background-color:#ffffff;}
.tftable td {font-size:16px;border-width: 1px;padding: 8px;border-style: solid;border-color: black;}
.tftable tr:hover {background-color:#CD8282;}


/* DIV PARA SCROLL */
.outer {overflow-y: auto;height: 385px;}
.outer {width: 100%;-layout: fixed;}






</style>


<div class='outer'>
<table class=" tftable table table-hover bg-light">
    <thead>
        <tr>
            <th>ID USUARIO</th>
            <th>USUARIO</th>
            <th>PASSWD</th>
            <th>NOMBRE</th>
            <th>APELLIDOS</th>
            <th>EMAIL</th>
            <th>TELEFONO</th>
            <th>ROL</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $user) : ?>
            <tr onclick="trData(this)" data-toggle="modal" data-target="#form" data-id='<?= $user->idusuario ?>'>
                <td><?= $user->idusuario ?></td>
                <td><?= $user->usuario ?></td>
                <td><?= $user->contrasenia ?></td>
                <td><?= $user->nombre ?></td>
                <td><?= $user->apellidos ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->telefono ?></td>
                <td><?= $user->rol ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>


<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: transparent;">
  <div class="modal-dialog modal-dialog-centered" role="document" style="background-color: transparent;">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
        <div class="modal-body">

          <!-- Input-->
          <div class="form-group">
            <label for="idusuarioname">ID USUARIO</label>
            <input type="text" class="form-control" name="idusuarioname" id="idusuario" aria-describedby="emailHelp" value="" readonly>
          </div>

          <!-- Input-->
          <div class="form-group">
            <label for="usuarioname">USUARIO</label>
            <input type="text" class="form-control" name="usuarioname" id="usuario" aria-describedby="emailHelp" value=''>
          </div>

          <!-- Input-->
          <div class="form-group">
            <label for="contrasenianame">CONTRASEÑA</label>
            <input type="text" class="form-control" name="contrasenianame" id="contrasenia" aria-describedby="emailHelp" value='' disabled>
          </div>

          <!-- Input-->
          <div class="form-group">
            <label for="nombrename">NOMBRE</label>
            <input type="text" class="form-control" name="nombrename" id="nombre" aria-describedby="emailHelp" value=''>
          </div>

          <!-- Input-->
          <div class="form-group">
            <label for="apellidosname">APELLIDOS</label>
            <input type="text" class="form-control" name="apellidosname" id="apellidos" aria-describedby="emailHelp" value=''>
          </div>

          <!-- Input-->
          <div class="form-group">
            <label for="emailname">EMAIL</label>
            <input type="text" class="form-control" name="emailname" id="email" aria-describedby="emailHelp" value=''>
          </div>

          <!-- Input-->
          <div class="form-group">
            <label for="telefononame">TELEFONO</label>
            <input type="text" class="form-control" name="telefononame" id="telefono" aria-describedby="emailHelp" value=''>
          </div>

          <!-- Input-->
          <div class="form-group">
            <label for="rolname">ROL</label>
            <input type="text" class="form-control" name="rolname" id="rol" aria-describedby="emailHelp" value=''>
          </div>

        </div>
        <div class="modal-footer border-top-0 d-flex justify-content-center">
          <button type="submit" class="btn btn-primary" formaction="/adminuser/update" button-book">Update</button>
          <button type="submit" class="btn btn-danger" formaction="/adminuser/delete" button-book">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>  

<div class='outer'>
<form method="POST" id="create"></form>
<table class=" tftable table table-hover bg-light">
    <thead>
        <tr>
            <th>USUARIO</th>
            <th>PASSWD</th>
            <th>NOMBRE</th>
            <th>APELLIDOS</th>
            <th>EMAIL</th>
            <th>TELEFONO</th>
            <th>ROL</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td> <input type="text" form="create" name="cusuario" id="isbn" value='' required></td>
                <td> <input type="text" form="create" name="ccontrasenia" id="isbn" value='' required></td>
                <td> <input type="text" form="create" name="cnombre" id="isbn" value='' required></td>
                <td> <input type="text" form="create" name="capellidos" id="isbn" value='' required></td>
                <td> <input type="text" form="create" name="cemail" id="isbn" value='' required></td>
                <td> <input type="text" form="create" name="ctelefono" id="isbn" value='' required></td>
                <td> <input type="text" form="create" name="crol" id="isbn" value='' required></td>
                <td> <button type="submit" class="btn btn-success" form="create" formaction="/adminuser/create" button-book">Create</button> </td>
            </tr>
    </tbody>
</table>
</div>
  
<script>
  function trData(trdata) {
    var trDataId = trdata.getAttribute("data-id");
    $.ajax({
       url: '/adminuser/trDataModal',
       type: 'POST',
       data: {trDataId : trDataId},
       success: function(response) {
          var json = JSON.parse(response);
          for (let i in json) {
            for (let j in json[i]) {
              
              $('#idusuario').attr("value", json[i][j].idusuario);
              $('#usuario').attr("value", json[i][j].usuario);
              $('#contrasenia').attr("value", json[i][j].contrasenia);
              $('#nombre').attr("value", json[i][j].nombre);
              $('#apellidos').attr("value",json[i][j].apellidos);
              $('#email').attr("value", json[i][j].email);
              $('#telefono').attr("value", json[i][j].telefono);
              $('#rol').attr("value", json[i][j].rol);
              }
          }
       }
    });
  }
</script>