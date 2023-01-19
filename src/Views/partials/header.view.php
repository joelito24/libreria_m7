<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"  href="public/img/favicon.ico">
    <link rel="stylesheet" href="public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<section class="header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-1">
        <div class="container-title">
          <a href="/" class="title">
            <img src="public/img/logo-footer.png" alt="logo-footer" class="img-footer">
          </a>
        </div>
      </div>
      <div class="col-4">
        <div class="container-title">
          <a href="/" class="title">
            <h1 class="title-principal">SUS Scrofa Libreria</h1>
          </a>
        </div>
      </div>
      <div class="col-7">
        <div class="header-menu">
          <a href="/" class="menu-item">HOME</a>
          
          <?php if(!isset($_SESSION['user'])){ ?>
            <a href="/register" class="menu-item">REGISTER</a>
            <a href="/auth" class="menu-item">LOGIN</a>
            <a href="/auth" class="menu-item"> <img src="public/img/profile.png" alt="user" class="user"> </a>
            
          <?php } else {?>
            <?php if ($_SESSION['user']['rol'] == "admin"){?>      
                <a href="/adminuser" class="menu-item">ADMIN - USER</a>
                <a href="/admincatalog" class="menu-item">ADMIN - LIBROS</a>
            <?php }?>
            <?php if ($_SESSION['user']['rol'] == 'cliente'){?>
                <a href="/catalogo" class="menu-item">CATALOGO</a>
            <?php } ?>
              <a href="/logout/logout" class="menu-item">LOGOUT</a>
              <a href="/profile" class="menu-item">
                <img src="public/img/profile.png" alt="user" class="user">
              </a>
          <?php }?>
            
        </div>
      </div>
    </div>
  </div>
</section>