<?php include 'partials/header.view.php' ?>
<title>Log - in</title>
<body class="body">
<section class="login">
  <div class="container-section-login">
    <h1 class="title-principal">LOGIN</h1>
  </div>
  <div class="container-fluid">
    <div class="row justify-content-center container-all">
      <div class="col-3 container-auth">
        <div class="container-form">
          <form class="form-login" action="/auth/singin" method="POST">
            <div class="container-email">
              Email: <input type="email" class="input" name="email">
            </div>
            <div class="container-password">
              Password: <input type="password" class="input" name="passwd">
            </div class="container-button">
            <div class="container-button-form">
              <button type="submit" class="button">Sign in</button> <?php if(isset($_SESSION['error']['auth'])){ print_r($_SESSION['error']['auth']);} ?>
            </div>
            <div class="container-link">
              <a href="/register" class="ask">you haven't registered?</a>
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