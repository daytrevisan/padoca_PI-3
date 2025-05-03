<?php
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
          <h4 class="page-header">Apontamentos de Produção</h4>
             <form class="form-inline" action="pesquisa-aponta.php" method="POST">
                <input type="text" class="form-control form-control-sm col-md-10 col-sm-10" name="c_pesquisa" placeholder="Pesquisar Apontamento de Produção" required="">
                 <input class="btn btn-sm btn-primary" type="submit" name="btn_pesquisa">
             </form>
           <hr>
              <!--Controlador de tamanho e margem da tabela-->
               <div class="table-responsive">
                    <table class="table table-hover">
                            <thead>
                                <th>Ordem</th>
                                <th>Oper.</th>
                                <th>Descrição Operação</th>
                                <th>Dt.Inicial</th>
                                <th>Hr.Inicial</th>
                                <th>Dt.Final</th>
                                <th>Hr.Final</th>
                                <th>Boas</th>
                                <th>Refugo</th>
                                <th>Sucata</th>
                                <th>Ações</th>
                            </thead>
                          <tbody>                      
                            <?php
                             //Chamando banco de dados
                             include("conexao.php");
                             //selecionando o banco de dados
                             $bd = mysqli_select_db($conexao, "padoca");
                            //fazendo a seleção da tabela SG6
                            $sql = "SELECT g6_cont, g6_ordem, g6_operacao, g6_descr_oper, g6_prod, g6_descr_prod, g6_data_ini, g6_hora_ini, g6_data_fim, g6_hora_fim, g6_qtd_boas, g6_qtd_refugo, g6_qtd_sucata FROM sg6 ORDER BY g6_ordem, g6_operacao, g6_data_ini";
                            //pegando os dados da tabela. Executando query
                            $resultado = mysqli_query($conexao, $sql);
                            while($linha = mysqli_fetch_array($resultado))
                            {
                               echo '<tr>';                  
                                   echo  '<td>'.$linha['g6_ordem'].'</td>';  
                                   echo  '<td>'.$linha['g6_operacao'].'</td>';  
                                   echo  '<td>'.$linha['g6_descr_oper'].'</td>';  
                                   // Inverter Data Formato AAAA-MM-DD para DD-MM-AAAA
                                   $data = $linha['g6_data_ini']; 
                                   $data_ini_formatada = date('d/m/Y', strtotime($data));
                                   echo '<td>' . $data_ini_formatada . '</td>';                                   

                                   echo  '<td>'.$linha['g6_hora_ini'].'</td>';  

                                   // Inverter Data Formato AAAA-MM-DD para DD-MM-AAAA
                                   $data = $linha['g6_data_fim']; 
                                   $data_fim_formatada = date('d/m/Y', strtotime($data));
                                   echo '<td>' . $data_fim_formatada . '</td>';                                   

                                   echo  '<td>'.$linha['g6_hora_fim'].'</td>';  
                                   echo  '<td>'.$linha['g6_qtd_boas'].'</td>';  
                                   echo  '<td>'.$linha['g6_qtd_refugo'].'</td>';  
                                   echo  '<td>'.$linha['g6_qtd_sucata'].'</td>';  
                                   //Ações                                      
                                   echo  "<td><button type='button' class='btn btn-sm btn-info'  data-toggle='modal' data-target='#myModal$linha[g6_cont]'> Mostrar</button'</td>";
                              echo "</tr>";
                              ?>
                                 <!--Inicio Modal.-->
                                  <div class="modal fade" id="myModal<?php echo $linha['g6_cont'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                      <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           <center><h3 class="modal-title" id="myModalLabel"> Apontamento da Ordem Produção: <?php echo $linha['g6_ordem'];?></h3></center>
                                          </div>
                                          <div class="modal-body">
                                               <b>Operação: </b><?php echo $linha['g6_operacao'];?><br><hr>
                                               <b>Descr.Oper.: </b><?php echo $linha['g6_descr_oper'];?><br><hr>
                                               <b>Produto: </b><?php echo $linha['g6_prod'];?><br><hr>
                                               <b>Descr.Prod.: </b><?php echo $linha['g6_descr_prod'];?><br><hr>
                                               <b>Data Inicial: </b><?php echo $linha['g6_data_ini'];?><br><hr>
                                               <b>Hora Inicial: </b><?php echo $linha['g6_hora_ini'];?><br><hr>
                                               <b>Data Final: </b><?php echo $linha['g6_data_fim'];?><br><hr>
                                               <b>Hora Final: </b><?php echo $linha['g6_hora_fim'];?><br><hr>
                                               <b>Qtd.Boas: </b><?php echo $linha['g6_qtd_boas'];?><br><hr>
                                               <b>Qtd.Refugo: </b><?php echo $linha['g6_qtd_refugo'];?><br><hr>
                                               <b>Qtd.Sucata: </b><?php echo $linha['g6_qtd_sucata'];?><br><hr>
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
