<!doctype html>
<html lang="Pt-Br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feira Facil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/index.css">
    <link rel="shortcut icon" href="../padoca/Imagens/icons8-bread-50.png">
   
  </head>
  <body>
 
</head>
<body>

  <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary shadow-lg p-3 mb-5 bg-white rounded"> <!--Barra Superior-->
    <div class="container-fluid">
      <a class="navbar-brand mb-0 h1" href="index2.php">Feira Facil</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="colaboradores2.html">Criadores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="termosdeusos2.html">Termos</a>
          </li>
        </ul>
        <div class="mw-auto" style="width: 8px;"></div>
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#notifications">
          Notificações <span class="badge text-bg-success">4</span>
        </button>
      </div>
    </div>
  </nav>

  <div class="mh-auto" style="height: 110px;"></div>  <!--Espaçamento-->

  <div class="card-group border-success mb-3 mx-auto" style="width: 96%"> <!--Grupo de Cards que aparecem com imagem-->
    <div class="card border-success mb-3"> <!--Card 1-->
      <div class="card-body">
        <h3 class="card-title">Meus Dados</h3>
        <div class="mh-auto" style="height: 20px;"></div>  <!--Espaçamento-->
        <h5 class="card-text btn-outline-success">Nome: Hingrid</h5>
        <h5 class="card-text btn-outline-success">Numero de Itens Cadastrados: 12</h5>
        <h5 class="card-text btn-outline-success">Nome: Numero de Barracas: 2</h5>
        <h5 class="card-text btn-outline-success">Funcionarios Cadastrados: 12</h5>
        <div class="mh-auto" style="height: 20px;"></div>  <!--Espaçamento-->
        <h3 class="card-title">Dados de Vendas</h3>
        <div class="mh-auto" style="height: 20px;"></div>  <!--Espaçamento-->
        <h5 class="card-text btn-outline-success">Vendas Essa Semana: 189</h5>
        <h5 class="card-text btn-outline-success">Estoque Total: 489 Itens</h5>
        <h5 class="card-text btn-outline-success">Valor Total: R$7.893</h5>
        <div class="mh-auto" style="height: 20px;"></div>  <!--Espaçamento-->
        <a class="btn btn-outline-success" href="itens.php">Itens Cadastrados</a> <a class="btn btn-outline-success" href="barracas.html">Barracas</a>
      </div>
    </div>
    <div class="card border-success mb-3"> <!--Card 3-->
      <div class="card-body">
        <div class="mh-auto" style="height: 20px;"></div>  <!--Espaçamento-->
        <h6>Gastos</h6>
        <div class="progress" style="height: 30px;">
          <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
          <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">35%</div>
          <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">30%</div>
          <div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">10%</div>
        </div>
        <div class="mh-auto" style="height: 20px;"></div>  <!--Espaçamento-->
        <div class="alert alert-primary" role="alert">
          Estoque R$ 500
        </div>
        <div class="alert alert-success" role="alert">
          Outros R$ 500
        </div>
        <div class="alert alert-danger" role="alert">
          Pagamento de Funcionarios R$1000
        </div>
        <div class="alert alert-warning" role="alert">
          Reparos R$735
        </div>
        <div class="mh-auto" style="height: 5px;"></div>  <!--Espaçamento-->
        <h6>Gastos Totais: R$2.235</h6>
      </div>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>