<?php
include '../config/db.php';
require_once '../controller/midia-create.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/carossel.css">

        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>


<body>
    <div class="">
                <div class="topo">
       <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src=".\imagens\icon\WATCH.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">Watch.com</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="TelaAdicionarMidia.php">Adicionar</a>
        <a class="nav-link" href="TelaCrud.php">Editar</a>
      </div>
    </div>
  </div>
</nav>
        </div>
    </div>

    <div class="meio">
        <h1 class="titulo">
            Qual midia você gostaria de adicionar?
        </h1>

        <button class="midiaPergunta" name="Filme">
            <a href="TelaFormularioFilme.php">Filme</a>
        </button>
        <button class="midia" name="Serie">
            <a href='TelaFormularioSerie.php'>Serie</a>
        </button>
    </div>

    <div class="sidebarRight"></div>
    <div class="rodape">
        <p class="rodape">Todos os direitos reservados - 2025</p></div>
    </div>

</body>

</html>