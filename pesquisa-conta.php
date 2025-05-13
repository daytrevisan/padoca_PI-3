<?php
// include("seguranca.php");
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <!--LINK CSS-->
        <link rel="stylesheet" href="Css/index.css">
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
              <a class="nav-link active" aria-current="page" href="fichas.php">Fichas Consumo</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="precos.php">Preços Venda</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="consumo.php">Consumo Padaria</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="pagamentos.php">Pagamentos</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="listar-pagamentos.php">Listar Pagamentos</a>
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
        <div class="container">
          <div class="container-principal-locals">
          <hr> <hr> <hr> <hr> <hr> <hr> <h4 class="page-header">FICHAS DE CONSUMO</h4>
             <form class="form-inline" action="pesquisa-ficha.php" method="POST">
                <input type="text" class="form-control form-control-sm col-md-10 col-sm-10" name="c_pesquisa" placeholder="Pesquisar Fichas de Consumo" required="">
                 <input class="btn btn-sm" type="submit" name="btn_pesquisa">
             </form>
           <hr>
              <!--Controlador de tamanho e margem da tabela-->
               <div class="table-responsive">
                    <table class="table table-hover">
                            <thead>
                                <th>Ficha</th>
                                <th>Descrição Ficha</th>
                                <th>Tipo</th>
                                <th>Situação</th>
                                <th>Valor Total</th>
                                <th>Valor Acumulado</th>
                                <th>Ações</th>
                            </thead>
                          <tbody>                      
                            <?php
                             //Chamando banco de dados
                             include_once('conexao.php');
                             $search=$_POST['c_pesquisa'];
                             mysqli_select_db($conexao,"padoca");
                             $resultado = mysqli_query($conexao, "SELECT p1_cont, p1_ficha, p1_descr_ficha, p1_tipo, p1_situacao, p1_vl_total, p1_vl_acumulado FROM pv1 WHERE p1_situacao='3-Fechada' and p1_ficha like '%".$search."%' ");
                             while($linha = mysqli_fetch_array($resultado))
                             {
                               echo '<tr>';                  
                                   echo  '<td>'.$linha['p1_ficha'].'</td>';  
                                   echo  '<td>'.$linha['p1_descr_ficha'].'</td>';  
                                   echo  '<td>'.$linha['p1_tipo'].'</td>';  
                                   echo  '<td>'.$linha['p1_situacao'].'</td>';  
                                   echo  '<td>'.$linha['p1_vl_total'].'</td>';  
                                   echo  '<td>'.$linha['p1_vl_acumulado'].'</td>';  
                                   //Ações                                      
                                   echo  "<td><button type='button' class='btn btn-sm btn-info'  data-toggle='modal' data-target='#myModal$linha[p1_cont]'> Mostrar</button>&nbsp<button type='button' class='btn btn-sm btn-warning'>Editar</button>&nbsp<button type='button' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#apagar$linha[p1_cont]'>Deletar</button>&nbsp</td>"; 
                              echo "</tr>";
                              ?>
                                 <!--Inicio Modal.-->
                                  <div class="modal fade" id="myModal<?php echo $linha['p1_cont'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                      <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           <center><h3 class="modal-title" id="myModalLabel"> Ficha de Consumo: <?php echo $linha['p1_cont'];?></h3></center>
                                          </div>
                                          <div class="modal-body">
                                               <b>Ficha: </b><?php echo $linha['p1_ficha'];?><br><hr>
                                               <b>Descr.Ficha.: </b><?php echo $linha['p1_descr_ficha'];?><br><hr>
                                               <b>Tipo: </b><?php echo $linha['p1_tipo'];?><br><hr>
                                               <b>Situação: </b><?php echo $linha['p1_situacao'];?><br><hr>
                                               <b>Valor Total: </b><?php echo $linha['p1_vl_total'];?><br><hr>
                                               <b>Valor Acumulado: </b><?php echo $linha['p1_vl_acumulado'];?><br><hr>
                                               <!--<b>Data:</b><?php //echo $linha['dt_insercao'];?><br><br>-->             
                                               </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                                <!--fim modal-->    
                                      <?php
                                }
                              mysqli_close($conexao);
                              ?>
                            </tbody>
                      </table>
            </div>
          </div>
       </div><!--Fechando container bootstrap-->
  <?php include("dep_query.php");?>     
  </body>
</html>
