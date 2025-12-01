<?php
  session_start();
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/FilmeModel.php';
require_once __DIR__ . '/../model/SerieModel.php';
require_once __DIR__ . '/../controller/midia-create.php';
$db = new Database();
$conn = $db->getConnection();

$midia = null;
if (isset($_GET['codigo']) && $_GET['codigo'] !== '') {
    $sql = "SELECT * FROM tbmidia WHERE codigo = :codigo";
    $stmt = $conn->prepare($sql);
    $stmt->execute([":codigo" => $_GET['codigo']]);
    $midia = $stmt->fetch(PDO::FETCH_OBJ);
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar mídia</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/carossel.css">
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

        <div class="container py-4">
            <?php if (!$midia): ?>
                <div class="alert alert-warning">
                    Mídia não encontrada ou código ausente.
                </div>
            <?php else: ?>
                <form action="../controller/midia-create.php" method="post" class="card p-3">
                    <input type="hidden" name="acao" value="editar">
                    <input type="hidden" name="codigo" value="<?php ($midia->codigo); ?>">

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control"
                               value="<?php ($midia->nome ?? ''); ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gênero</label>
                        <select name="genero" class="form-select" required>
                            <option value="Romance"    <?php if(($midia->genero ?? '')=='Romance')    echo 'selected'; ?>>Romance</option>
                            <option value="Ação"       <?php if(($midia->genero ?? '')=='Ação')       echo 'selected'; ?>>Ação</option>
                            <option value="Comédia"    <?php if(($midia->genero ?? '')=='Comédia')    echo 'selected'; ?>>Comédia</option>
                            <option value="Animação"   <?php if(($midia->genero ?? '')=='Animação')   echo 'selected'; ?>>Animação</option>
                            <option value="Terror"     <?php if(($midia->genero ?? '')=='Terror')     echo 'selected'; ?>>Terror</option>
                            <option value="Ficção"     <?php if(($midia->genero ?? '')=='Ficção')     echo 'selected'; ?>>Ficção</option>
                            <option value="Aventura"   <?php if(($midia->genero ?? '')=='Aventura')   echo 'selected'; ?>>Aventura</option>
                            <option value="Musical"    <?php if(($midia->genero ?? '')=='Musical')    echo 'selected'; ?>>Musical</option>
                            <option value="Suspense"   <?php if(($midia->genero ?? '')=='Suspense')   echo 'selected'; ?>>Suspense</option>
                            <option value="Documentario" <?php if(($midia->genero ?? '')=='Documentario') echo 'selected'; ?>>Documentário</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sinopse</label>
                        <input type="text" name="sinopse" class="form-control"
                               value="<?php ($midia->sinopse ?? ''); ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Classificação</label>
                        <select name="clasInd" class="form-select" required>
                            <option value="Livre" <?php if(($midia->clasInd ?? '')=='Livre') echo 'selected'; ?>>Livre</option>
                            <option value="10"    <?php if(($midia->clasInd ?? '')=='10')    echo 'selected'; ?>>10</option>
                            <option value="12"    <?php if(($midia->clasInd ?? '')=='12')    echo 'selected'; ?>>12</option>
                            <option value="14"    <?php if(($midia->clasInd ?? '')=='14')    echo 'selected'; ?>>14</option>
                            <option value="16"    <?php if(($midia->clasInd ?? '')=='16')    echo 'selected'; ?>>16</option>
                            <option value="18"    <?php if(($midia->clasInd ?? '')=='18')    echo 'selected'; ?>>18</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ano de lançamento</label>
                        <input type="number" min="1940" name="anoLanc" id="anoLanc" class="form-control"
                               value="<?php ($midia->anoLanc ?? ''); ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" id="tipo" class="form-select" required>
                            <option value="Filme" <?php if(($midia->tipo ?? '')=='Filme') echo 'selected'; ?>>Filme</option>
                            <option value="Serie" <?php if(($midia->tipo ?? '')=='Serie') echo 'selected'; ?>>Série</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Episódios</label>
                        <input type="text" name="episodio" id="episodio" class="form-control"
                               value="<?php ($midia->episodio ?? ''); ?>">
                    </div>

                    <div class="d-flex gap-2">
                        <button class="btn btn-success" type="submit">Salvar</button>
                        <a class="btn btn-secondary" href="TelaCrud.php">Cancelar</a>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
