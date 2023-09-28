function atualizarCampos(){
    var inputs = document.querySelectorAll('input');

    inputs.forEach(input => input.value = '');
}


function verificarCamposCadastrar(){
    var nome = document.getElementById("Nome");
    var tipo = document.getElementById("Tipo");
    var valor = document.getElementById("Valor");
    var quantidade= document.getElementById("Quantidade");

    if(nome.value === '' || tipo.value === '' || valor.value === '' || quantidade.value === '' ){
        alert("Campos nao preenchidos, verifique os dados inseridos e preencha novamente!");
        atualizarCampos();
        return false;
    }
    else{
        return true;
    }
}

function verificarCamposProcurar(){
    var proNome = document.getElementById("proNome");
    var proTipo = document.getElementById("proTipo");
    var proId = document.getElementById("proId");
    //verifica se ao menos 1 campo foi preenchido
    if(proNome.value === ''){
        if(proTipo.value === ''){
            if(proId.value === ''){
                alert("Preencha ao menos 1 campo para realizar a busca!");
                return false;
            }
        }
    }
    else{
        if(proNome.value !== '' && proTipo.value !== '' || proNome.value !== '' && proId.value !== ''){
            alert ("Preencha apenas 1 campo para realizar a busca!");
            return false;
        }
        else if(proTipo.value !== '' && proId.value !== ''){
            alert ("Preencha apenas 1 campo para realizar a busca!");
            return false;
        }
        
        else{
            return true;
        }
    }
}

function verificarCamposRemover(){
    var remoProduto = document.getElementById("remoId");

    if(remoProduto.value === ''){
        alert("Preencha o campo com o ID");
        return false;
    }
    else{
        return true;
    }
}