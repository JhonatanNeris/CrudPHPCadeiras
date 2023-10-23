<?php
     //Vai verificar se a nossa sessão esta ativa
     require_once("verificar.php");
     //Vai fazer a conexão com o nosso banco de dados imaginária
     require_once("includes/conectarBD.php");
     //Função que vai exibir a data completa, dia e ano corrente
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
    <li><a href="formExcluirCadeiras.php"><i class="material-icons left">delete</i>Exclusão de Cadeiras</a></li>
    <li><a href="menuGerCadeiras.php"><i class="material-icons left">chair</i>Gerenciamento de Cadeiras</a></li>
    <li><a href="menuOpcoesGeral.php"><i class="material-icons left">computer</i>Menu Opções Geral</a></li></ul>
</ul>
<ul id="mobile-navbar" class="sidenav">
    <li><a href="formIncluirCadeiras.php"><i class="material-icons left">assignment_turned_in</i>Incluir</a>
    <li><a href="formAlterarCadeiras.php"><i class="material-icons left">done</i>Alterar</a>
    <li><a href="formExcluirCadeiras.php"><i class="material-icons left">delete</i>Excluir</a>
    <li><a href="menuPesquisarCadeiras.php"><i class="material-icons left">search</i>Pesquisar</a>
    <li class="divider" tabindex="-1"></li>
    <li><a href="formExcluirCadeiras.php"><i class="material-icons left">delete</i>Exclusão de Cadeiras</a></li>
    <li><a href="menuGerCadeiras.php"><i class="material-icons left">chair</i>Gerenciamento de Cadeiras</a></li>
    <li><a href="menuOpcoesGeral.php"><i class="material-icons left">computer</i>Menu Opções Geral</a></li></ul>
<div>
<?php
    //Exibirá o nome do usuário que está logado e a data corrente
    echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
?></b><br/><br/>

<table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td height="60"><div align="center"><font face="Arial" size="4"><b>Excluir Dados de Cadeiras</b></font></div></td>
    </tr>
</table>  

<?php
     if (!isset($_POST["cadID"])&& !isset($_POST["enviar"]))
     {
?>
     <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
           <!-- <p>Código da Cadeira: <input type="text" name="cadID" size="10">
           <input type="submit" value="Excluir Dados da Cadeira" name="excluir"></p>
           <div align="left"><font face="Arial" size="2"><b>Não Lembra o Código?<a href='pesqTodosCadeiras.php'> Clique Aqui </a><br></font></div> -->
            <div class = "container" style="margin-top: 100px">
                <div class="row">
                    <div class = "col s12">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">chair</i>
                            <input type="text" name="cadID" required>
                            <label for="cadFabricante">Código da cadeira:</label>
                        </div>
                    </div>
                </div>

                <div align="center">
                    <button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="excluir" value="Excluir dados da Cadeira"><i class="material-icons left">delete</i>Excluir Dados da Cadeira</button>
                    </br></br>
                    <a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">logout</i>Sair do Sistema Cadeiras</a>
                </div>
    </form>
<?php
     }
     //Vai buscar dados da Cadeira
     else if(!isset($_POST["enviar"])) 
     {
        $cadID = $_POST["cadID"];
        $consulta = mysqli_query($conexao, "SELECT cadID, cadFabricante, cadModelo FROM cadeira WHERE cadId = '$cadID'");          
        //obtem a resposta do Select executado acima
        $linha = mysqli_num_rows($consulta);
     if ($linha == 0) //verifica quantas linhas teve a query executada, se for igual a zero o cliente nao foi encontrado
     {
          echo "Cadeira não encontrada $cadID";
     }
     else
     {
          echo "<div><font face=Arial size=4><b>Cadeira Encontrada:</b></font></div>";
          //seta a linha de campoCadeira da tabela cadeiras e depois coloca cada campo em uma variavel
          $campoCadeira = mysqli_fetch_row($consulta);
          $cadID = $campoCadeira[0];
          $cadFabricante = $campoCadeira[1];
          $cadModelo = $campoCadeira[2];        
?>
          <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
             <!-- <tr bgcolor="#6699CC"> -->
             <tr>
                 <td colspan="15"><div align="center"><font face="Arial" size="2"><b><font color="#000">Cadeiras Cadastradas</font></b></font></div></td>
             </tr>
             <tr><td width="5%"><div align="center"><b><font face="Arial" size="2">Código do Cadeira</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Fabricante</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Modelo</font></b></div></td>
             </tr>
             <tr>
                 <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $cadID;?></font></td>
                 <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $cadFabricante;?></font></td>
                 <td width="20%" height="25"><b><font face="Arial" size="2"><?php echo $cadModelo;?></font></td>
             </tr>
          </table>
          <!-- <input type ="hidden" name="cadID" value="<?php echo $cadID;?>">
          <input type ="hidden" name="enviar" value="S"> -->
          <!-- <input type ="submit" value="Deseja Realmente Excluir a Cadeira?" name="excluir"></p> -->
          <div align="center" style="margin-top: 100px">
                    <input type ="hidden" name="cadID" value="<?php echo $cadID;?>">
                    <input type ="hidden" name="enviar" value="S">
                    <button type="submit" class="waves-effect waves-light btn-large blue lighten-1" name="excluir" value="Excluir dados da Cadeira"><i class="material-icons left">delete</i>Deseja realmente excluir a cadeira?</button>
                    </br></br>
                    <a href="sair.php" class="waves-effect waves-light btn-large blue lighten-1"><i class="material-icons left">logout</i>Sair do Sistema Cadeiras</a>
                </div>
          </form>
<?php
          mysqli_close($conexao);
     }
     }
     else
     // Excluir Cadeira
     {
          $cadID = $_POST["cadID"];
          $deleta = mysqli_query($conexao, "DELETE FROM cadeira WHERE cadID = '$cadID'");
          //O comando mysqli_affected_rows(), vai retornar a quantidade de linhas alteradas com o comando DELETE
          if (mysqli_affected_rows($conexao)>0)
          {
             echo "<p align='center'>Dados da Cadeira foram excluídos com sucesso!!!</p>";              
          }
          else
          {
              $erro=mysqli_error($conexao);
              echo "<p align='center'>Erro:$erro</p>";
          }
              mysqli_close($conexao);
          }
?>
<?php
    include_once 'includes/rodape.php';
?>