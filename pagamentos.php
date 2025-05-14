<?
// include("seguranca.php");
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <!--LINK CSS-->
        <link rel="stylesheet" href="Css/index.css">
        <link rel="stylesheet" href="Css/pags-aux.css">
    <link rel="shortcut icon" href="../padoca/Imagens/images/bread-icon.png">
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
                <a class="nav-link active" aria-current="page" href="termosdeusos2.html">Termos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="fichas.php">Fichas Consumo</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="precos.php">Preços Venda</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="consumo.php">Consumo Padaria</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="listar-pagamentos.php">Listar Pagamentos</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="listar-fichas.php">Listar Fichas</a>
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
        <h4 class="page-header">Pagamentos</h4>
        <hr>
           <form action="cadastro-pagamentos.php" method="POST" enctype="multipart/form-data" name="upload">
              <div class="row">
                <div class="form-group col-md-3">
                  <label>Ficha de Consumo:</label>
                  <input class="form-control form-control-sm col-md-10 col-sm-10" type="text" name="c_ficha" placeholder="Informe a ficha de consumo" required/>
                </div>
                <div class="form-group col-md-2">
                    <label>Forma de Pagamento:</label>
                    <select  name="c_forma" class="form-control form-control-sm col-md-10 col-sm-10" placeholder="Informe a forma de pagamento" required>
                      <option value="1-Dinheiro">1-Dinheiro</option>
                      <option value="2-Débito">2-Débito</option>
                      <option value="3-Crédito">3-Crédito</option>
                      <option value="4-Pix">4-Pix</option>
                      <option value="5-Outros">5-Outros</option>
                    </select>
                  </div>
                <div class="form-group col-md-3">
                  <label>Valor a Pagar:</label>
                  <input class="form-control form-control-sm col-md-10 col-sm-10" type="text" name="c_valor" placeholder="Informe valor a pagar" required/>
                </div>
            <hr>
                  <div class="row">
                  <div class="form-group col-md-8">
                <input type="submit" class="btn btn-primary" name="btn_enviar" id="btn-efetuar" value="Efetuar Pagamento">
            </form>
            <hr>

            <form action="fechar-conta.php" method="POST" enctype="multipart/form-data" name="upload">

            <div class="row">
                <div class="form-group col-md-3">
                  <label>Ficha de Consumo:</label>
                  <input class="form-control form-control-sm col-md-10 col-sm-10" type="text" name="c_ficha" placeholder="Ficha de consumo" required/>
                </div>
                <div class="row">
                  <hr>
                  <div class="row">
                  <div class="form-group col-md-8">
                <input type="submit" class="btn btn-warning" name="btn_enviar" value="Fechar Conta">
            </form>


          </div><!--Fechando container bootstrap-->
  <?php include("dep_query.php");?>     
  </body>
</html>

