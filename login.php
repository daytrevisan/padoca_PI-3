<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/login.css">
    <title>Entre na Padoca</title>
    <link rel="shortcut icon" href="Imagens/icons/bread-icon.png">
</head>

<body>

    <div class="container">

        <div class="form">
            <div class="form-header">
                <div class="form-img">
                    <img src="Imagens/logos/logo_padoca.png">
                </div>
                <div class="form-title">
                    <h1>Entre na Padoca</h1>
                </div>
            </div>
            <form action="Conexaologin.php" method="post">
                <div class="input-group">

                    <div class="input-box">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" name="cpf" placeholder="Digite seu CPF" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}">
                        <small>Formato: 000.000.000-00</small>
                    </div>

                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>

                </div>

                <div class="continue-button">
                    <button class="btn btn-outline-success" type="submit">Continuar</button>
                </div>
                <br>
                <div class="form-check">
                    <input type="checkbox" value="" id="invalidCheck" required>
                    <label for="invalidCheck">
                        Concordar com os 
                        <a href="termosdeusos.html">Termos de Usos</a>
                    </label>
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="login">
                    <h4>Ainda não tem uma conta?
                        <a href="cadastre-se.php">Cadastre-se</a>
                    </h4>
                </div>
            </form>
        </div>
    </div>

    <!-- The Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modalMessage"></p>
        </div>
    </div>

    <script>
        document.getElementById('cpf').addEventListener('input', function(event) {
            var input = event.target;
            var value = input.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            var formattedValue = '';

            if (value.length > 0) {
                formattedValue += value.substring(0, 3);
                if (value.length >= 4) {
                    formattedValue += '.' + value.substring(3, 6);
                }
                if (value.length >= 7) {
                    formattedValue += '.' + value.substring(6, 9);
                }
                if (value.length >= 10) {
                    formattedValue += '-' + value.substring(9, 11);
                }
            }

            input.value = formattedValue;
        });

        // Get the modal
        var modal = document.getElementById("modal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // check de mensagem erro, caso sejá prenchido errado CPF ou Senha exibirar o popup
        <?php if (isset($_GET['error'])): ?>
            var errorMessage = "<?php echo htmlspecialchars($_GET['error']); ?>";
            document.getElementById('modalMessage').innerText = errorMessage;
            document.getElementById('modalMessage').classList.add('error');
            modal.style.display = "block";
        <?php elseif (isset($_GET['success'])): ?>
            var successMessage = "<?php echo htmlspecialchars($_GET['success']); ?>";
            document.getElementById('modalMessage').innerText = successMessage;
            document.getElementById('modalMessage').classList.add('success');
            modal.style.display = "block";
            setTimeout(function() {
                window.location.href = 'menu.html'; // Substitua pela página de destino
            }, 2000); // Redireciona após 2 segundos
        <?php endif; ?>
    </script>

</body>

</html>
