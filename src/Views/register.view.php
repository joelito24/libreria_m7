
<?php include 'partials/header.view.php' ?>
<title>Registrar</title>
<body class="body">
  <section class="register">
    <div class="container-section-register">
      <h1 class="title-principal">REGISTRARSE</h1>
    </div>
    <div class="container-fluid">
      <div class="row justify-content-center container-all">
        <div class="col-3 container-auth">
          <div class="container-form">
            <form class="form-register" action="/register/signup" method="POST">
              <div style="display:inline-grid">      
                <div class="container-input">
                  Usuario: <input type="text" class="input" name="usr" required>
                </div>
                <div class="container-input">
                  Contraseña: <input type="password" class="input" name="passwd" required>
                </div>
                <div class="container-input">
                  Nombre: <input type="text" class="input" name="name" required>
                </div>
                <div class="container-input">
                  Apellidos: <input type="text" class="input" name="apellidos" required>
                </div>
                <div class="container-input">
                  Email: <input type="email" class="input" name="email" required>
                </div>
                <div class="container-input">
                  Numero Tel: <input type="tel" class="input" name="tel" required>
                </div>
              </div>
              <div class="container-button-form">
                <button type="submit" class="button">Sign up</button> <?php if(isset($_SESSION['error']['register'])){ echo $_SESSION['error']['register'];} ?>
              </div>
              <div class="container-link">
                <a href="/auth" class="ask">Are you already registered?
</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>  
</body>
<?php include 'partials/footer.view.php' ?>
</html>
