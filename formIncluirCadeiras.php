<?php
    //Verificará se a nossa sessão está ativa
    require_once("verificar.php");
    //A função que exibirá a data completa, dia e ano corrente
    include 'includes/exibirDia.fcn';
    include_once 'includes/cabecalho.php';
?>
<div class="nav-bar-fixed">
    <nav>
        <div class="nav-wrapper blue lighten-1">
            <a href="#!" class="brand-logo">Menu de Opções</a>
            <a href="#" data-target="mobile-navbar" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="navbar-itens" class="right hide-on-med-and-down">
                <li><a href="formIncluirCadeiras.php">Incluir</a>
                <li><a href="formAlterarCadeiras.php">Alterar</a>
                <li><a href="formExcluirCadeiras.php">Excluir</a>
                <li><a href="menuPesquisarCadeiras.php">Pesquisar</a>
                <li><a class="dropdown-trigger" data-target="dropdown">Voltar<i class="material-icons">arrow_drop_down</i></a></li>
            </ul>
        </div> 
    </nav>
</div>
<ul id="dropdown" class="dropdown-content">
    <li><a href="menuGerCadeiras.php"><i class="material-icons left">chair</i>Gerenciamento de Cadeiras</a></li>
    <li><a href="menuOpcoesGeral.php"><i class="material-icons left">computer</i>Menu Opções Geral</a></li>
</ul>
<ul id="mobile-navbar" class="sidenav">
    <li><a href="formIncluirCadeiras.php"><i class="material-icons left">assignment_turned_in</i>Incluir</a>
    <li><a href="formAlterarCadeiras.php"><i class="material-icons left">done</i>Alterar</a>
    <li><a href="formExcluirCadeiras.php"><i class="material-icons left">delete</i>Excluir</a>
    <li><a href="menuPesquisarCadeiras.php"><i class="material-icons left">search</i>Pesquisar</a>
    <li class="divider" tabindex="-1"></li>
    <li><a href="menuGerCadeiras.php"><i class="material-icons left">chair</i>Gerenciamento de Cadeiras</a></li>
    <li><a href="menuOpcoesGeral.php"><i class="material-icons left">computer</i>Menu Opções Geral</a></li>
</ul>
<div>
<?php
    //Exibirá o nome do usuário que está logado e a data corrente
    echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
?></b><br/><br/>
<table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td height="60"><div align="center"><font face="Arial" size="4"><b>Cadastro de Cadeiras</b></font></div></td>
    </tr>
</table>
<form name="formCadeiras" id="formCadeiras" method="POST" action="incluirCadeiras.php">
    <div class = "container" style="margin-top: 100px">
        <div class="row">
            <div class = "col s12">
                <div class="input-field col s12">
                    <i class="material-icons prefix">business</i>
                    <input type="text" name="cadFabricante" required>
                    <label for="cadFabricante">Fabricante:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class = "col s12">
                <div class="input-field col s12">
                    <i class="material-icons prefix">chair</i>
                    <input type="text" name="cadModelo" required>
                    <label for="cadModelo">Modelo:</label>
                </div>
            </div>
        </div>

    </div><br/><br/>
    <div align="center">
        <button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="cadCadeira" value="Cadastrar Cadeira"><i class="material-icons left">add</i>Cadastrar Cadeira</button>
        </br></br>
        <a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">logout</i>Sair do Sistema Cadeiras</a>
    </div>
</form>

<?php
    include_once 'includes/rodape.php';
?>