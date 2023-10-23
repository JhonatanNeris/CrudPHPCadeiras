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
                <li><a href="menuGerCadeiras.php">Gerenciamento de Cadeiras</a></li>
            </ul>
        </div>
    </nav>
</div>
<ul id="mobile-navbar" class="sidenav">
    <li><a href="menuGerCadeiras.php"><i class="material-icons left">chair</i>Gerenciamento de Cadeiras</a></li>
</ul>
<div>
    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
    ?>
</div>
</b><br/><br/>
 <?php include_once 'includes/imagem.php'; ?>
<div align="center">
    <a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">logout</i>Sair do Sistema Cadeiras</a>
</div>
<?php
    include_once 'includes/rodape.php';
?>
