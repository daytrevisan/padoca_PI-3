<?
// include("seguranca.php");
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <!--LINK CSS-->
        <link rel="stylesheet" href="Css/index.css">
    <link rel="shortcut icon" href="../padoca/Imagens/icons/bread-icon.png">
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
              <a class="nav-link active" aria-current="page" href="local-produto.php">Local Produto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="listar-produtos.php">Listar Produtos</a>
        </li> 
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="listar-locais.php">Listar Locais</a>
        </li> 
        <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="movto-estoque.php">Movimento Estoque</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="fabrica.html">Fábrica</a>
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
        <hr> <hr> <hr> <hr> <hr> <hr> <h4 class="page-header">CADASTRO DE PRODUTO</h4>
         <hr>
            <form action="cadastro-prod.php" method="POST" enctype="multipart/form-data" name="upload">
              <div class="row">

              <div class="form-group col-md-3">
                  <label>Codigo Produto:</label>
                  <input class="form-control form-control-sm col-md-10 col-sm-10" type="text" name="c_cod" placeholder="Digite o codigo do produto" required/>
                </div>
                   <hr>
                <div class="form-group col-md-6">
                  <label>Nome do Produto:</label>
                  <input class="form-control form-control-sm col-md-10 col-sm-10" type="text" name="c_nome" placeholder="Digite o nome do produto" required/>
                </div>
                <div class="form-group col-md-3">
                    <label>UM:</label>
                    <input class="form-control form-control-sm col-md-10 col-sm-10" type="text" name="c_um" placeholder="Digite a unidade medida do produto" required>
                  </div>    
                  <hr>
                  <div class="form-group col-md-3">
                    <label>Quantidade:</label>
                    <input class="form-control form-control-sm col-md-10 col-sm-10" type="text" name="c_qtde" placeholder="Digite a qtde do produto" required>
                  </div>      
                  <div class="form-group col-md-3">
                    <label>Valor:</label>
                    <input class="form-control form-control-sm col-md-10 col-sm-10" type="text" name="c_valor" placeholder="Digite o valor do produto" required>
                  </div>      
                  <div class="form-group col-md-2">
                    <label>Tipo do Produto:</label>
                    <select  name="c_tipo" class="form-control form-control-sm col-md-10 col-sm-10" placeholder="Digite o tipo do produto" required>
                      <option value="Comprado">Comprado</option>
                      <option value="Produzido">Produzido</option>
                      <option value="Beneficiado">Beneficiado</option>   
                      <option value="Final">Final</option>   
                    </select>
                  </div>
                  <hr>
                </div>
                <div class="row">
                  <div class="form-group col-md-8">
                                <!--Realizando Upload de Imagem-->
                            <label class="control-label">Imagem</label>
                            <input class="form-control" type="file" name="img">
                  </div> 
              </div>
              <div class="row">
                <div class="form-group col-md-8">
                  <label>Descrição do Produto:</label>
                  <textarea cols="4" rows="2" class="form-control col-md-8" name="c_desc" placeholder="Digite alguma descrição sobre o produto"></textarea> 
                </div>
              </div>
              <input type="submit" class="btn btn-primary" name="btn_enviar" value="Cadastrar">
            </form>
          </div>
       </div><!--Fechando container bootstrap-->
  <?php include("dep_query.php");?>     
  </body>
</html>

