<?php
    require_once 'model.php';

    session_start();
    $produto = new Produto();

    //Verifica se é uma ação de cadastramento
    if(!empty($_POST["Nome"])){
        $_SESSION['Nome'] = $_POST['Nome'];
        $_SESSION['Valor'] = $_POST['Valor'];
        $_SESSION['Tipo'] = $_POST['Tipo'];
        $_SESSION['Quantidade'] = $_POST['Quantidade'];

        $produto->adicionarProduto();
    }

    //Verifica se é uma ação de procura
    if(!empty($_POST["proNome"]) || !empty($_POST["proTipo"]) || !empty($_POST["proId"])){
        $_SESSION['proNome'] = $_POST['proNome'];
        $_SESSION['proTipo'] = $_POST['proTipo'];
        $_SESSION['proId'] = $_POST['proId'];

        $produto->procurarProduto();
    }

    //Verifica se é uma ação de remoção
    if(!empty($_POST["remoId"])){
        $_SESSION['remoId'] = $_POST["remoId"];

        $produto->removerProduto();
    }
?>

<html>
    <body>
        <br>
        <input type="button" value="Voltar" onClick="document.location.href='index.html'">
    </body>
</html>