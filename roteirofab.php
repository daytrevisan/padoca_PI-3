<?
// include("seguranca.php");
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <!--LINK CSS-->
        <link rel="stylesheet" href="Css/index.css">
        <link rel="stylesheet" href="Css/pags-aux.css">
    <link rel="shortcut icon" href="Imagens/icons/bread-icon.png">
        <!--LINK CDN BOOTSTRAP-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      </head>
    <body>

    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary shadow-lg p-3 mb-5 bg-white rounded"> <!--Barra Superior-->
        <div class="container-fluid">
          <a class="navbar-brand mb-1 h1" href="index.php">
            <div class="img-logo">
              <img src="Imagens/logos/logo_padoca.png" style="height: 50px !important; width: auto !important;" alt="Logotipo da Padoca composto pela escrita do nome com uma imagem de pão e outra de engrenagem onde combinadas trazem a ideia de sistema para padarias">
            </div>
          </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="criadores.html">Criadores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="termosdeusos.html">Termos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="estrutura.php">Estrutura</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="operacaofab.php">Operações</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="listar-roteiro.php">Listar Roteiros</a>
          </li>
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="processofab.php">Processos</a>
        </li> 
        <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="ordemprod.php">Ordem Prod.</a>
            </li> 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="apontamento.php">Apontamentos</a>
        </li> 
            </ul>
         <div class="mw-auto" style="width: 8px;"></div>
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#notifications">
            Notificações <span class="badge text-bg-success">3</span>
            </button>
        </div>
       </div>
    </nav>
    <P>
        <div class="container-fluid">
        </div>
        <div class="container">
        <div class="container-principal-produtos">
        <h4 class="page-header">Roteiros de Fabricação</h4>
         <hr>
            <form action="cadastro-roteiro.php" method="POST" enctype="multipart/form-data" name="upload">
              <div class="row">

              <div class="form-group col-md-3">
                  <label>Roteiro:</label>
                  <input class="form-control form-control-sm col-md-10 col-sm-10" type="text" name="c_roteiro" placeholder="Informe o roteiro de fabricação" required/>
                </div>
                <hr>
                <div class="form-group col-md-3">
                  <label>Descrição:</label>
                  <input class="form-control form-control-sm col-md-10 col-sm-10" type="text" name="c_descr" placeholder="Informe a descrição do roteiro" required/>
                </div>
                <div class="form-group col-md-3">
                  <label>Operação:</label>
                  <input class="form-control form-control-sm col-md-10 col-sm-10" type="text" name="c_oper" placeholder="Informe a operação" required>
                </div>    
                  <hr>
                  <div class="form-group col-md-3">
                    <label>Centro de Trabalho:</label>
                    <input class="form-control form-control-sm col-md-10 col-sm-10" type="text" name="c_trab" placeholder="Informe o centro de trabalho" required>
                  </div>      
                  <div class="form-group col-md-3">
                    <label>Arranjo Físico:</label>
                    <input class="form-control form-control-sm col-md-10 col-sm-10" type="text" name="c_arranjo" placeholder="Informe o arranjo físico" required>
                  </div>      
                  <div class="form-group col-md-2">
                    <label>Centro de Custo:</label>
                    <select  name="c_custo" class="form-control form-control-sm col-md-10 col-sm-10" placeholder="Informe o centro de custo" required>
                      <option value="CC-0001-Panificacao">CC-0001-Panificacao</option>
                      <option value="CC-0002-Doceria">CC-0002-Doceria</option>
                      <option value="CC-0003-Salgateria">CC-0003-Salgateria</option>
                      <option value="CC-0004-Bolos">CC-0004-Bolos</option>
                      <option value="CC-0005-KIT Festas">CC-0005-KIT Festas</option>
                      <option value="CC-0006-KIT Bebidas">CC-0006-KIT Bebidas</option>
                    </select>
                  </div>
                  <hr>
                  <div class="row">
                  <div class="form-group col-md-8">
                <input type="submit" class="btn btn-primary" name="btn_enviar" value="Cadastrar">
            </form>
        </div><!--Fechando container bootstrap-->
  <?php include("dep_query.php");?>     
  </body>
</html>

