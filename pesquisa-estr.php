<?php
// include("seguranca.php");
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <!--LINK CSS-->
        <link rel="stylesheet" href="Css/index.css">
        <link rel="stylesheet" href="Css/pags-aux.css">
        <link rel="shortcut icon" href="../padoca/Imagens/icons/bread-icon.png">
        <!--LINK CDN BOOTSTRAP-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      </head>
    <body>

    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary shadow-lg p-3 mb-5 bg-white rounded"> <!--Barra Superior-->
        <div class="container-fluid">
        <a class="navbar-brand mb-0 h1" href="index.php">Padoca</a>
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
              <a class="nav-link active" aria-current="page" href="estrutura.php">Estrutura</a>
          </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="operacaofab.php">Operações</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="roteirofab.php">Roteiros</a>
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
        <div class="container">
          <div class="container-principal-locals">
          <h4 class="page-header">Estruturas Cadastradas</h4>
             <form class="form-inline" action="pesquisa-estr.php" method="POST">
                <input type="text" class="form-control form-control-sm col-md-10 col-sm-10" name="c_pesquisa" placeholder="Pesquisar Estrutura" required="">
                 <input class="btn btn-sm btn-primary" type="submit" name="btn_pesquisa">
             </form>
           <hr>
              <!--Controlador de tamanho e margem da tabela-->
               <div class="table-responsive">
                    <table class="table table-hover">
                            <thead>
                            <th>#</th>  
                                <th>Prod</th>
                                <th>Seq.</th>
                                <th>Comp</th>
                                <th>Qt.Neces.</th>
                                <th>Qt.Perda</th>
                                <th>Lista</th>
                                <th>Qt.Horas</th>
                                <th>Ações</th>
                            </thead>
                          <tbody>                      
                          <?php
                           include_once('conexao.php');
                           $search=$_POST['c_pesquisa'];
                           mysqli_select_db($conexao,"padoca");
                           $resultado = mysqli_query($conexao, "SELECT g1_cont, g1_cod, g1_seq, g1_comp, g1_qtde, g1_perda, g1_lista, g1_qtde_hora FROM sg1 WHERE g1_cod like '%".$search."%' ");
                           while($linha = mysqli_fetch_array($resultado))
                            {
                               echo '<tr>';                  
                                   echo  '<td>'.$linha['g1_cont'].'</td>';
                                   echo  '<td>'.$linha['g1_cod'].'</td>';  
                                   echo  '<td>'.$linha['g1_seq'].'</td>';  
                                   echo  '<td>'.$linha['g1_comp'].'</td>';  
                                   echo  '<td>'.$linha['g1_qtde'].'</td>';  
                                   echo  '<td>'.$linha['g1_perda'].'</td>';  
                                   echo  '<td>'.$linha['g1_lista'].'</td>';  
                                   echo  '<td>'.$linha['g1_qtde_hora'].'</td>';  
                                   //Ações                                      
                                   echo  "<td><button type='button' class='btn btn-sm btn-info'  data-toggle='modal' data-target='#myModal$linha[g1_cont]'> Mostrar</button>&nbsp<button type='button' class='btn btn-sm btn-warning'>Editar</button>&nbsp<button type='button' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#apagar$linha[g1_cont]'>Deletar</button>&nbsp</td>"; 
                                                                       
                              echo "</tr>";
                              ?>
                                 <!--Inicio Modal.-->
                                  <div class="modal fade" id="myModal<?php echo $linha['g1_cont'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                      <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           <center><h3 class="modal-title" id="myModalLabel"> Estrutura: <?php echo $linha['g1_cont'];?></h3></center>
                                          </div>
                                          <div class="modal-body">
                                               <b>Prod: </b><?php echo $linha['g1_cod'];?><br><hr>
                                               <b>Seq: </b><?php echo $linha['g1_seq'];?><br><hr>
                                               <b>Comp: </b><?php echo $linha['g1_comp'];?><br><hr>
                                               <b>Qt.Neces: </b><?php echo $linha['g1_qtde'];?><br><hr>
                                               <b>Qt.Perda: </b><?php echo $linha['g1_perda'];?><br><hr>
                                               <b>Lista: </b><?php echo $linha['g1_lista'];?><br><hr>
                                               <b>Qt.Horas: </b><?php echo $linha['g1_qtde_hora'];?><br><hr>
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
