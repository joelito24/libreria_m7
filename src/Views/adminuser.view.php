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
            <tr>
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
            <label for="isbnname">USUARIO</label>
            <input type="text" class="form-control" name="isbnname" id="isbn" aria-describedby="emailHelp" value=''>
          </div>

          <!-- Input-->
          <div class="form-group">
            <label for="tituloname">CONTRASEÑA</label>
            <input type="text" class="form-control" name="tituloname" id="titulo" aria-describedby="emailHelp" value=''>
          </div>

          <!-- Input-->
          <div class="form-group">
            <label for="linkname">NOMBRE</label>
            <input type="text" class="form-control" name="linkname" id="link" aria-describedby="emailHelp" value=''>
          </div>

          <!-- Input-->
          <div class="form-group">
            <label for="numpagname">APELLIDOS</label>
            <input type="text" class="form-control" name="numpagname" id="npaginas" aria-describedby="emailHelp" value=''>
          </div>

          <!-- Input-->
          <div class="form-group">
            <label for="descriptionname">EMAIL</label>
            <input type="text" class="form-control" name="descriptionname" id="descripcion" aria-describedby="emailHelp" value=''>
          </div>

          <!-- Input-->
          <div class="form-group">
            <label for="autorname">TELEFONO</label>
            <input type="text" class="form-control" name="autorname" id="autor" aria-describedby="emailHelp" value=''>
          </div>

          <!-- Input-->
          <div class="form-group">
            <label for="valoracionname">ROL</label>
            <input type="text" class="form-control" name="valoracionname" id="valoracion" aria-describedby="emailHelp" value=''>
          </div>

        </div>
        <div class="modal-footer border-top-0 d-flex justify-content-center">
          <button type="submit" class="btn btn-primary" formaction="/admincatalog/update" button-book">Update</button>
          <button type="submit" class="btn btn-danger" formaction="/admincatalog/delete" button-book">Delete</button>
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
            <th>ISBN</th>
            <th>TITULO</th>
            <th>LINK</th>
            <th>Nº PAGINAS</th>
            <th>DESCRIPCION</th>
            <th>AUTOR</th>
            <th>VALORACION</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td> <input type="text" form="create" name="cisbn" id="isbn" value='' required></td>
                <td> <input type="text" form="create" name="ctitulo" id="isbn" value='' required></td>
                <td> <input type="text" form="create" name="clink" id="isbn" value='' required></td>
                <td> <input type="text" form="create" name="cnpaginas" id="isbn" value='' required></td>
                <td> <input type="text" form="create" name="cdescription" id="isbn" value='' required></td>
                <td> <input type="text" form="create" name="cautor" id="isbn" value='' required></td>
                <td> <input type="text" form="create" name="cvaloracion" id="isbn" value='' required></td>
                <td> <button type="submit" class="btn btn-success" form="create" formaction="/admincatalog/create" button-book">Create</button> </td>
            </tr>
    </tbody>
</table>
</div>
  
<script>
  function trData(trdata) {
    var trDataId = trdata.getAttribute("data-id");
    $.ajax({
       url: '/admincatalog/trDataModal',
       type: 'POST',
       data: {trDataId : trDataId},
       success: function(response) {
          var json = JSON.parse(response);
          for (let i in json) {
            for (let j in json[i]) {
              $('#idlibro').attr("value", json[i][j].idlibro);
              $('#isbn').attr("value", json[i][j].isbn);
              $('#titulo').attr("value", json[i][j].titulo);
              $('#link').attr("value", json[i][j].link);
              $('#npaginas').attr("value",json[i][j].npaginas);
              $('#descripcion').attr("value", json[i][j].descripcion);
              $('#autor').attr("value", json[i][j].autor);
              $('#valoracion').attr("value", json[i][j].valoracion);
              }
          }
       }
    });
  }
</script>