<?php
    require_once 'view.php';
    
    class Produto{
        private $conexao;

        public function gerarId(){
            $this->conexao = new Conexao();
            $this->conexao->criarConexao();

            $sql = ("SELECT COUNT(*) AS nome FROM produtos");
            $query = mysqli_query( $this->conexao->conn,$sql);
            return $query;
        }

        public function procurar($input, $inputTipo){
            $display = new Mostrar();       
            $this->conexao = new Conexao();
            $this->conexao->criarConexao();

            $sql = ("SELECT * FROM produtos WHERE $inputTipo = '$input'");
            $query = mysqli_query($this->conexao->conn,$sql);
            $produto = mysqli_fetch_assoc($query);

            //Não é possível passar a "query" para impressão diretamente devido variáveis e ponteiros, por isso uma nova query foi feita.
            $query2 = mysqli_query($this->conexao->conn,$sql);

            if($produto == 0){
                echo "Erro ao procurar o produto!";
            }
            else{
                $display->imprimirTabela($query2);
            }
            mysqli_close($this->conexao->conn);
        }

        public function adicionarProduto(){
            $idArray = mysqli_fetch_assoc($this->gerarId());
            $id = 1 + $idArray["nome"];

            $nome = $_SESSION['Nome'];
            $tipo = $_SESSION['Tipo'];
            $valor = $_SESSION['Valor'];
            $quantidade = $_SESSION['Quantidade'];

            $sql = ("INSERT INTO produtos (nome,tipo,valor,id,quantidade) VALUES('$nome','$tipo','$valor','$id','$quantidade')");
            if(!$query = mysqli_query( $this->conexao->conn,$sql)){
                echo ("Nao foi possivel cadastrar!");
            }
            else{
                echo("Cadastramento feito com sucesso!");
            }
            mysqli_close($this->conexao->conn);
        }

        public function procurarProduto(){
            $proNome = $_SESSION['proNome'];
            $proTipo = $_SESSION['proTipo'];
            $proId = $_SESSION['proId'];
            
            if($proNome != null){
                $this->procurar($proNome,'nome');
            }
            if ($proTipo != null){
                $this->procurar($proTipo,'tipo');
            }
            
            if($proId != null){
                $this->procurar($proId,'id');
            }
        }

        public function removerProduto(){
            $this->conexao = new Conexao();
            $this->conexao->criarConexao();
            $remoProduto = $_SESSION['remoId'];
            
            $sql1 = ("SELECT * FROM produtos WHERE id ='$remoProduto'");
            $remoQuery = mysqli_query($this->conexao->conn,$sql1);
            $produto = mysqli_fetch_assoc($remoQuery);

            if($produto == 0){
                echo ("Falha ao remover produto com o id: "."$remoProduto".".");
            }

            else{
                $sql2 = ("DELETE FROM produtos WHERE id= '$remoProduto'");
                $removeQuery = mysqli_query($this->conexao->conn,$sql2);

                echo ("O produto com o id: "."$remoProduto". " foi removido!");
            }
            mysqli_close($this->conexao->conn);
        }
    }
    
    class Conexao{
        public $usuario = "root";
        public $host = "localhost";
        public $senha = "root";
        public $banco = "produtos";

        public $conn;
    
        public function criarConexao(){
            $this->conn = mysqli_connect($this->host,$this->usuario,$this->senha,$this->banco);
        }
    }
?>