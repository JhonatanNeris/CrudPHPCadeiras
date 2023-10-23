<?php
    require_once("includes/conectarBD.php");
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
    <?
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
    ?>
</div>
</b><br/><br/>
<table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td height="60"><div align="center"><font face="Arial" size="4"><b>Alterar Dados de Cadeira</b></font></div></td>
    </tr>
</table>
<?php
    if (!isset($_POST["cadID"])&& !isset($_POST["enviar"]))
    {
?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <div class = "container" style="margin-top: 100px">
            <div class="row">
                <div class = "col s12">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">chair</i>
                        <input type="text" name="cadID" size="10" required>
                        <label for="cadID">Código da Cadeira</label>
                    </div>
                </div>
            </div>
            <div class="row center">
                <div class = "col s12">
                    <button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="alterar" value="Alterar Dados da Cadeira"><i class="material-icons left">chair</i>Alterar Dados da Cadeira</button>
                    <div><br>
                        <div class = "col s12">
                            <!-- <button type="button" class="waves-effect waves-light btn-large blue lighten-1">Não Lembra o Código?<a href='pesqTodosCadeiras.php'>Clique Aqui </button> -->
                            <!-- Botão de cima não está funcionando muito bem! -->
                            <a class="waves-effect waves-light btn-large blue lighten-1" href='pesqTodosCadeiras.php'>Não lembra o código? CLIQUE AQUI</a>
                        </div>
                    </div>
                </div>
            
    </form>
<?php
    }
        //Buscará os dados da Cadeira
        else if(!isset($_POST["enviar"]))
        {
            $cadID= $_POST["cadID"];
            $consulta = mysqli_query($conexao, "SELECT cadID, cadFabricante, cadModelo FROM cadeira WHERE cadID = '$cadID'");
            //obtém a resposta do Select executado acima
            $linha = mysqli_num_rows($consulta);
            if ($linha == 0) //verifica quantas linhas teve a query executada e se for igual a zero, a cadeira não foi encontrada
        {
            echo "Cadeira não encontrada $cadID";
        }
        else
        {
            echo "<div><font face=Arial size=4><b>Cadeira Encontrada:</b></font></div>";
            //seta a linha de campoCadeira da tabela cadeiras e depois, coloca cada campo em uma variável.
            $campoCadeira = mysqli_fetch_row($consulta);
            $cadFabricante = $campoCadeira[1];
            $cadModelo = $campoCadeira[2];    
?>
            <form name="formCadeiras" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
                    <tr>
                        <td colspan="15"><div align="center"><font face="Arial" size="2"><b><font color="#">Cadeiras Cadastradas</font></b></font></div></td>
                    </tr>
                    <tr>
                        <td width="5%"><div align="center"><b><font face="Arial" size="2">Código da Cadeira</font></b></div></td>
                        <td width="5%"><div align="center"><b><font face="Arial" size="2">Fabricante</font></b></div></td>
                        <td width="5%"><div align="center"><b><font face="Arial" size="2">Modelo</font></b></div></td>                    
                    </tr>
                    <tr>
                        <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $cadID;?></font></td>                    
                        <td width="20%" height="25"><b><font face="Arial" size="2"><input type="text" name="cadFabricante" size="42" value="<?php echo $cadFabricante;?>"></font></td>
                        <td width="10%" height="25"><b><font face="Arial" size="2"><input type="text" name="cadModelo" size="42" value="<?php echo $cadModelo;?>"></font></td>
                    </tr>
                </table>
                <input type ="hidden" name="cadID" value="<?php echo $cadID;?>">
                <input type ="hidden" name="enviar" value="S"><br>
                <div class = "col s12 center">
                    <button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="alterar" value="Alterar Dados da Cadeira"><i class="material-icons left">chair</i>Alterar Dados da Cadeira</button>
                </div>
            </form>

<?php
        mysqli_close($conexao);
        }
        }   
        else // alterar cadeira
        {
            $cadID=$_POST["cadID"];
            $cadFabricante=$_POST["cadFabricante"];
            $cadModelo=$_POST["cadModelo"];
            $altera = mysqli_query($conexao, "UPDATE cadeira SET cadID='$cadID', cadFabricante='$cadFabricante', cadModelo='$cadModelo' WHERE cadID='$cadID'");
            //O comando mysqli_affected_rows( ) retornará a quantidade de linhas alteradas com o comando UPDATE
            if (mysqli_affected_rows($conexao) > 0)
            {
                echo "<p align='center'>Dados da Cadeira $cadModelo alterados com sucesso!!! Verifique abaixo a alteração feita.</p>";
                echo "<table width='100%' border='0' cellspacing='1' cellpadding='0' align='center'>";
                    echo "<tr>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td width='10%'><div align='center'><b><font face='Arial'csize='2'>Código da Cadeira</font></b></div></td>";
                        echo "<td width='10%'><div align='center'><b><font face='Arial' size='2'>Fabricante</font></b></div></td>";
                        echo "<td width='20%'><div align='center'><b><font face='Arial' size='2'>Modelo</font></b></div></td>";                       
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$cadID</font></td>";
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$cadFabricante</font></td>";
                        echo "<td width='20%' height='25'><b><font face='Arial' size='2'>$cadModelo</font></td>";
                    echo "</tr>";
                echo "</table>";
            }
            else
            {
                $erro=mysqli_error($conexao );
                echo "<p align='center'>Erro:$erro</p>";
            }
            mysqli_close($conexao);
        }
?>
    <div class = "col s12 center">
        <br><a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">logout</i>Sair do Sistema Cadeiras</a>
    </div>
<?php
    include_once 'includes/rodape.php';
?>
