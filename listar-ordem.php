<?php
// include("seguranca.php");
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <!--LINK CSS-->
        <link rel="stylesheet" href="Css/index.css">
    <link rel="shortcut icon" href="../padoca/Imagens/icons8-bread-50.png">
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
          <hr> <hr> <hr> <hr> <hr> <hr> <h4 class="page-header">ORDENS DE PRODUÇÃO</h4>
             <form class="form-inline" action="pesquisa-ordem.php" method="POST">
                <input type="text" class="form-control form-control-sm col-md-10 col-sm-10" name="c_pesquisa" placeholder="Pesquisar Ordem de Produção" required="">
                 <input class="btn btn-sm" type="submit" name="btn_pesquisa">
             </form>
           <hr>
              <!--Controlador de tamanho e margem da tabela-->
               <div class="table-responsive">
                    <table class="table table-hover">
                            <thead>
                                <th>Ordem</th>
                                <th>Situação</th>
                                <th>Prod.</th>
                                <th>Descrição Produto</th>
                                <th>Entrega</th>
                                <th>Planej.</th>
                                <th>Boas</th>
                                <th>Ref/Suc</th>
                                <th>Saldo</th>
                                <th>Roteiro</th>
                                <th>Ap.Oper.</th>
                                <th>Ações</th>
                            </thead>
                          <tbody>                      
                            <?php
                             //Chamando banco de dados
                             include("conexao.php");
                             //selecionando o banco de dados
                             $bd = mysqli_select_db($conexao, "padoca");
                            //fazendo a seleção da tabela SG5
                            $sql = "SELECT g5_cont, g5_ordem, g5_situacao, g5_prod, g5_descr_prod, g5_entrega, g5_qtd_planej, g5_qtd_boas, g5_qtd_refugo, g5_qtd_sucata, g5_qtd_saldo, g5_roteiro, g5_bx_comp, g5_apon_oper FROM sg5 ORDER BY g5_ordem, g5_prod, g5_entrega";
                            //pegando os dados da tabela. Executando query
                            $resultado = mysqli_query($conexao, $sql);
                            while($linha = mysqli_fetch_array($resultado))
                            {
                              $c_refugo=$linha['g5_qtd_refugo'];
                              $c_sucata=$linha['g5_qtd_sucata'];
                              $c_refsuc=$c_refugo+$c_sucata;

                              echo '<tr>';                  
                                   echo  '<td>'.$linha['g5_ordem'].'</td>';  
                                   echo  '<td>'.$linha['g5_situacao'].'</td>';  
                                   echo  '<td>'.$linha['g5_prod'].'</td>';  
                                   echo  '<td>'.$linha['g5_descr_prod'].'</td>'; 

                                   // Inverter Data Formato AAAA-MM-DD para DD-MM-AAAA
                                   $data = $linha['g5_entrega']; 
                                   $data_formatada = date('d/m/Y', strtotime($data));

                                   echo  '<td>' . $data_formatada . '</td>';                                   
                                   echo  '<td>'.$linha['g5_qtd_planej'].'</td>';  
                                   echo  '<td>'.$linha['g5_qtd_boas'].'</td>';  
                                   echo  '<td>'.$c_refsuc.'</td>';  
                                   echo  '<td>'.$linha['g5_qtd_saldo'].'</td>';  
                                   echo  '<td>'.$linha['g5_roteiro'].'</td>';  
                                   echo  '<td>'.$linha['g5_apon_oper'].'</td>';  
                                   //Ações                                      
                                   echo  "<td><button type='button' class='btn btn-sm btn-info'  data-toggle='modal' data-target='#myModal$linha[g5_cont]'> Mostrar</button'</td>";
                              echo "</tr>";
                              ?>
                                 <!--Inicio Modal.-->
                                  <div class="modal fade" id="myModal<?php echo $linha['g5_cont'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                      <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           <center><h3 class="modal-title" id="myModalLabel"> Ordem Produção: <?php echo $linha['g5_ordem'];?></h3></center>
                                          </div>
                                          <div class="modal-body">
                                               <b>Situação: </b><?php echo $linha['g5_situacao'];?><br><hr>
                                               <b>Produto: </b><?php echo $linha['g5_prod'];?><br><hr>
                                               <b>Descr.Prod.: </b><?php echo $linha['g5_descr_prod'];?><br><hr>
                                               <b>Data Entrega: </b><?php echo $linha['g5_entrega'];?><br><hr>
                                               <b>Qtd.Planejada: </b><?php echo $linha['g5_qtd_planej'];?><br><hr>
                                               <b>Qtd.Boas: </b><?php echo $linha['g5_qtd_boas'];?><br><hr>
                                               <b>Qtd.Refugo: </b><?php echo $linha['g5_qtd_refugo'];?><br><hr>
                                               <b>Qtd.Sucata: </b><?php echo $linha['g5_qtd_sucata'];?><br><hr>
                                               <b>Qtd.Saldo: </b><?php echo $linha['g5_qtd_saldo'];?><br><hr>
                                               <b>Roteiro: </b><?php echo $linha['g5_roteiro'];?><br><hr>
                                               <b>BX.Componente: </b><?php echo $linha['g5_bx_comp'];?><br><hr>
                                               <b>Aponta Operação: </b><?php echo $linha['g5_apon_oper'];?><br><hr>
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
