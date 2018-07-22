<?php session_start() ?>

<?php include_once 'include/header.inc.php' ?>
<?php include_once 'include/menu.inc.php' ?>

    <!-- Formulario de Cadastro -->

    <div class="row-container">
        <p>&nbsp;</p>
        <form action="banco_de_dados/create.php" method="post" class="col s12">
            <fieldset class="formulario" style="padding: 15px">
                <legend><img src="imagens/avatar.png" alt="[imagem]" width="100"></legend>
                <h5 class="light center">Cadastro de Clientes</h5>

                <?php
                    if(isset($_SESSION['msg'])):
                        echo $_SESSION['msg'];
                        session_unset();
                    endif;
                ?>

                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" name="nome" id="nome" maxlength="40" required autofocus>
                    <label for="nome">Nome Cliente </label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input type="email" name="email" id="email" maxlength="50" required >
                    <label for="email">E-mail Cliente </label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">phone</i>
                    <input type="tel" name="tel" id="tel" maxlength="15" required >
                    <label for="tel">Telefone Cliente </label>
                </div>

                <!-- Botões -->

                <div class="input-field col s12">
                    <input type="submit" value="cadastrar" class="btn blue">
                    <input type="reset" value="limpar" class="btn red">
                </div>

            </fieldset>
        </form>
    </div>

<?php include_once 'include/footer.inc.php' ?>