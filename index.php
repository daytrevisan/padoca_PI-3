<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Padoca</title>
        <link rel="stylesheet" href="Css/reset.css">
        <link rel="stylesheet" href="Css/index.css">
        <link rel="shortcut icon" href="Imagens/icons/bread-icon.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        
    </head>

    <body>
        <header>
            <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary shadow-lg p-3 mb-5 bg-white rounded"> <!--Barra Superior-->
                
                <div class="container-banner">
                    <div class="container-left">
                        <a class="navbar-brand mb-0 h1" href="index.php">
                            <div class="img-logo">
                                <img src="Imagens/logos/logo_padoca.png" alt="Logotipo da Padoca composto pela escrita do nome com uma imagem de pão e outra de engrenagem onde combinadas trazem a ideia de sistema para padarias">
                            </div>
                        </a>
                        <div class="slogan-termos">
                            <h6 class="nav-item slogan">
                                O sistema da sua padaria em boas mãos
                            </h6>
                            <h6 class="nav-item termos">
                                    <a class="nav-link active" aria-current="page" href="termosdeusos.html">Acesse nossos termos</a>
                            </h6>    
                        </div>    
                    </div>
                    
                    <div class="container-right">

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#notifications">
                                Notificações <span class="badge text-bg-success">3</span>
                            </button>
                            <div class="mw-auto" style="width: 7px;"></div>
                            <a class="btn btn-outline-success" href="login.php">Login</a>
                            <div class="mw-auto" style="width: 7px;"></div>
                            <a class="btn btn-outline-success" href="cadastre-se.php">Cadastre-se</a>
                        </div>
                    </div>
                </div>
            </nav>

            <!--Mensagem de login que aparece-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="exampleInputEmail1" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <label for="exampleInputPassword1" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                            <div class="mh-auto" style="height: 10px;"></div>
                            <a href="Login.html" class="btn btn-outline-success">Esqueci a senha</a>
                        </div>
                        <div class="modal-footer">
                            <a href="Cadastre-se.php" class="btn btn-outline-success">Cadastre-se</a>
                            <a href="login.php" class="btn btn-outline-success">Entrar</a>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="modal fade" id="notifications" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Notificações</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="notifications-list">
                                <img class="list-bread" src="Imagens/icons/bread-icon.png">
                                <p class="modal-dialog">Agora nós temos a área de suporte ao usuário</p>
                            </div>
                            <div class="notifications-list">
                                <img class="list-bread" src="Imagens/icons/bread-icon.png">
                                <p class="modal-dialog">Você pode conferir quem são nossos <a href="criadores.html" class="links-modal enable-pointer">criadores</a> e também nossos <a href="colaboradores.html" class="links-modal enable-pointer">colaboradores</a></p>
                            </div>
                            <div class="notifications-list">
                                <img class="list-bread" src="Imagens/icons/bread-icon.png">
                                <p class="modal-dialog">Faça seu <a href="login.php" class="links-modal enable-pointer">login</a> ou <a href="cadastre-se.html" class="links-modal enable-pointer">cadastro</a> para conferir suas informações</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!--Fundo onde tá os botões no outro-->
                        </div>
                    </div>
                </div>
            </div>           
        </header>

        <section class="banner">
            <div class="card mx-auto img-card"> <!--Card inicial grande-->
                <img src="Imagens/images/padoca-banner.jpeg" class="card-banner" alt="...">
                <!-- <div class="card-img-overlay">
                </div> -->
            </div>
        </section>

        <div class="main-content">
            <main>

                <div class="main-top">
                    <section class="vantagens">
                        <div class="card-group border-success mb-3 mx-auto"> <!--Grupo de Cards que aparecem com imagem-->
                            <div class="card border-success mb-3"> <!--Card 1-->
                                <div class="card-body">
                                    <div class="card-body-title d-flex">
                                        <img class="img-index" src="Imagens/icons/facilidade.png" class="card-img-bottom align-center" alt="Ícone de mão com gesto que remete à facilidade, no sentido que está na mão">
                                        <h4 class="card-title">Facilidade</h5>
                                    </div>
                                    <p class="card-text">Gerencie o estoque de sua padaria com muito mais facilidade e assertividade com o sistema de gerenciamento Padoca. Faça já o seu cadastro e conheça nosso sistema.</p>
                                    <p class="card-text"><img class="img-card" src="Imagens/icons/icon-check.svg"><small class="text-body-secondary">Interface intuitiva e sistema sempre disponível</small></p>
                                </div>
                            </div>
                            <div class="card border-success mb-3"> <!--Card 2-->
                                <div class="card-body">
                                    <div class="card-body-title d-flex">
                                        <img class="img-index" src="Imagens/icons/confianca.png" class="card-img-bottom align-center" alt="Ícone de um escudo para transmitir segurança e confiança em nossos serviços">
                                        <h4 class="card-title">Confiança</h5>
                                    </div>
                                    <p class="card-text">Sistema desenvolvido para manter suas informações com segurança e confidencialidade gerando ainda mais confiança aos nossos clientes.</p>
                                    <p class="card-text"><img class="img-card" src="Imagens/icons/icon-check.svg"><small class="text-body-secondary">Confiabilidade para seus dados de estoque</small></p>
                                </div>
                            </div>
                            <div class="card border-success mb-3"> <!--Card 3-->
                                <div class="card-body align-items-end">
                                    <div class="card-body-title d-flex">
                                        <img class="img-index" src="Imagens/icons/rapidez.png" class="card-img-bottom align-center" alt="Ícone de relógio com traços posteriores que reforçam a ideia de rapidez">
                                        <h4 class="card-title">Velocidade</h5>
                                    </div>
                                    <p class="card-text">Nosso sistema garante o melhor desempenho acompanhando o seu crescimento de perto, sempre eficaz e rápido para poder seu gerenciamento do dia-a-dia.</p>
                                    <p class="card-text"><img class="img-card" src="Imagens/icons/icon-check.svg"><small class="text-body-secondary">Melhor desempenho para seus processos</small></p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="main-middle">

                    <div class="middle-first-line">

                        <div class="main-cards">
                            <section class="destaques">
                                <div class="card-destaques"><!--Área de destaques-->
                                    <div class="destaques-title">
                                        <h3 class="card-title">Destaques</h3>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-center">Consulte nossos termos de usos</p>
                                        <a href="termosdeusos.html" class="btn btn-outline-success">Consultar</a>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="main-cards">
                            <section class="ajuda">
                                <div class="card-ajuda" style="width: 96%;"> <!--Área de destaques-->
                                    <div class="ajuda-title">
                                        <h3 class="card-title">Precisa de ajuda?</h3>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-center">Não deixe de nos contatar</p>
                                        <button class="btn btn-outline-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Suporte ao usuário</button>
                                        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                                        <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Aba de suporte ao usuário</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    
                                    <div class="offcanvas-body">
                                                
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                        Minha senha não está funcionando
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">Entre contato com o suporte do site</div>
                                                    </div>
                                                </div>
                                
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                    Não está carregando a página
                                                </button>
                                            </h2>
                                            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">Limpe a memória cache</div>
                                        </div>
                                    </div>
                                    
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                O site não responde
                                            </button>
                                        </h2>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">Verifique sua conexão</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                <div class="card-ajuda-text card-footer text-muted">
                                    Caso ainda tenha alguma dúvida, contate nossa equipe <a href="criadores.html">aqui</a>
                                </div>
                                        </div>
                            </section>
                        </div>

                    </div>

                    <div class="middle-second-line">

                        <div class="main-cards card-clientes main-logos">
                            <section class="nossos-clientes">
                                <div class="clientes-title">
                                    <h3 class="card-title">Nossos Clientes</h3>
                                </div>
                                <div class="clientes-logo">
                                    <img class="img-clientes-logo" src="Imagens/logos/client-galeria-dos-paes.png" alt="Logotipo da padaria Galeria dos Pães, um cliente de nossos clientes">
                                    <img class="img-clientes-logo" src="Imagens/logos/client-le-pain.png" alt="Logotipo da padaria LePain, um cliente de nossos clientes">
                                    <img class="img-clientes-logo" src="Imagens/logos/client-graoipiranga.png" alt="Logotipo da padaria Grão Ipiranga, um cliente de nossos clientes">
                                </div>
                            </section>    
                        </div>
        
                        <div class="main-cards card-social main-logos">
                            <section class="redes-sociais">
                                <div class="social-title">
                                    <h3 class="card-title">Nossas redes</h3>
                                </div>
                                <div class="social-logo">
                                    <a href="https://www.facebook.com/padoca"><img class="img-social-logo" src="Imagens/logos/logo-facebook.png" alt="Logotipo da rede social Facebook em preto e branco"></a>
                                    <a href="https://www.instagram.com/padoca"><img class="img-social-logo" src="Imagens/logos/logo-instagram.png" alt="Logotipo da rede social Instagram em preto e branco"></a>
                                    <a href="https://www.x.com/padoca"><img class="img-social-logo" src="Imagens/logos/logo-twitter.png" alt="Logotipo da rede social Twitter em preto e branco"></a>
                                </div>
                            </section>
                        </div>
                    </div>

                </div>
            </main>
        </div>

        <footer id="footer">
            
            <div id="footer-footer" class="footer-container">

                <img src="Imagens/logos/logo_padoca.png" alt="Logotipo da Padoca">
                <p id="copyright">&copy; Copyright Padoca Sistemas para Padarias - 2024</p>   

            </div>

        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    </body>

</html>