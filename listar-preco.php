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
          <h4 class="page-header">Preços de Venda</h4>
             <form class="form-inline" action="pesquisa-preco.php" method="POST">
                <input type="text" class="form-control form-control-sm col-md-10 col-sm-10" name="c_pesquisa" placeholder="Pesquisar Preços de Venda" required="">
                 <input class="btn btn-sm btn-primary" type="submit" name="btn_pesquisa">
             </form>
           <hr>
              <!--Controlador de tamanho e margem da tabela-->
               <div class="table-responsive">
                    <table class="table table-hover">
                            <thead>
                                <th>Produto</th>
                                <th>Descrição do Produto</th>
                                <th>UM</th>
                                <th>Preço de Venda</th>
                                <th>Familia</th>
                                <th>Data Validade</th>
                                <th>Data Cadastro</th>
                                <th>Ações</th>
                            </thead>
                          <tbody>                      
                            <?php
                             //Chamando banco de dados
                             include("conexao.php");
                             //selecionando o banco de dados
                             $bd = mysqli_select_db($conexao, "padoca");
                            //fazendo a seleção da tabela PV1
                            $sql = "SELECT p2_cont, p2_prod, p2_descr_prod, p2_um, p2_preco, p2_familia, p2_data_val, p2_data_atu FROM pv2 ORDER BY p2_familia DESC";
                            //pegando os dados da tabela. Executando query
                            $resultado = mysqli_query($conexao, $sql);
                            while($linha = mysqli_fetch_array($resultado))
                            {
                               echo '<tr>';                  
                                   echo  '<td>'.$linha['p2_prod'].'</td>';  
                                   echo  '<td>'.$linha['p2_descr_prod'].'</td>';  
                                   echo  '<td>'.$linha['p2_um'].'</td>';  
                                   echo  '<td>'.$linha['p2_preco'].'</td>'; 
                                   echo  '<td>'.$linha['p2_familia'].'</td>';  

                                   // Inverter Data Formato AAAA-MM-DD para DD-MM-AAAA
                                   $data = $linha['p2_data_val']; 
                                   $data_formatada = date('d/m/Y', strtotime($data));
                                   echo  '<td>' . $data_formatada . '</td>';                                   
                                   
                                   // Inverter Data Formato AAAA-MM-DD para DD-MM-AAAA
                                   $data = $linha['p2_data_atu']; 
                                   $data_formatada = date('d/m/Y', strtotime($data));
                                   echo  '<td>' . $data_formatada . '</td>';                                   

                                   //Ações                                      
                                   echo  "<td><button type='button' class='btn btn-sm btn-info'  data-toggle='modal' data-target='#myModal$linha[p2_cont]'> Mostrar</button>&nbsp<button type='button' class='btn btn-sm btn-warning'>Editar</button>&nbsp<button type='button' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#apagar$linha[p2_cont]'>Deletar</button>&nbsp</td>"; 
                              echo "</tr>";
                              ?>
                                 <!--Inicio Modal.-->
                                  <div class="modal fade" id="myModal<?php echo $linha['p2_cont'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                      <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           <center><h3 class="modal-title" id="myModalLabel"> Preco de Venda: <?php echo $linha['p2_cont'];?></h3></center>
                                          </div>
                                          <div class="modal-body">
                                               <b>Produto: </b><?php echo $linha['p2_prod'];?><br><hr>
                                               <b>Descr.Produto: </b><?php echo $linha['p2_descr_prod'];?><br><hr>
                                               <b>UM: </b><?php echo $linha['p2_um'];?><br><hr>
                                               <b>Preço: </b><?php echo $linha['p2_preco'];?><br><hr>
                                               <b>Familia: </b><?php echo $linha['p2_familia'];?><br><hr>
                                               <b>Data Validade: </b><?php echo $linha['p2_data_val'];?><br><hr>
                                               <b>Data Atualização: </b><?php echo $linha['p2_data_atu'];?><br><hr>
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
