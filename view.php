<?php
    class Mostrar{
        public function imprimirTabela($query){
            echo "<table><tr><td>Nome</td><td>Tipo</td><td>Valor</td><td>Id</td><td>Quantidade</td></tr></table>";
            while($array = mysqli_fetch_assoc($query)){
                echo "<table><tr><td>".$array["nome"]."</td><td> ".$array["tipo"]."</td><td> ".$array["valor"]."</td><td> ".$array["id"]." </td><td>".$array["quantidade"]."</tr></table>";
            }
        }
    }
?>