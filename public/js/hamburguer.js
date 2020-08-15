

let valor = 0;

function addQueijo(){
    valor += 0.5;
    let qtd = document.getElementById('qtd-queijo').value;
    qtd++;
    atualizarValor();
    document.getElementById('qtd-queijo').value = qtd;

    let principal = document.getElementById('adicionais')
    let adicional = document.createElement('div');
    adicional.id = "queijo-"+qtd;
    adicional.className = "adc-queijo";
    principal.appendChild(adicional);
}

function rmvQueijo(){
    let qtd = document.getElementById('qtd-queijo').value;
    let rmv_elemento = document.getElementById('queijo-'+qtd);
    let principal = document.getElementById('adicionais');
    principal.removeChild(rmv_elemento);
    console.log(rmv_elemento);

    if(qtd>0){
        valor -= 0.5;
        atualizarValor();
        qtd--;
        document.getElementById('qtd-queijo').value = qtd;
    }   
}

/**** PRESUNTO */
function addPresunto(){
    valor += 0.7;
    valor = parseFloat(valor.toFixed(2))
    let qtd = document.getElementById('qtd-presunto').value;
    qtd++;
    atualizarValor();

    document.getElementById('qtd-presunto').value = qtd;

    let principal = document.getElementById('adicionais')
    let adicional = document.createElement('div');
    adicional.id = "presunto-"+qtd;
    adicional.className = "adc-presunto";
    principal.appendChild(adicional);
}

function rmvPresunto(){
    let qtd = document.getElementById('qtd-presunto').value;
    let rmv_elemento = document.getElementById('presunto-'+qtd);
    let principal = document.getElementById('adicionais');
    principal.removeChild(rmv_elemento);
    console.log(rmv_elemento);

    if(qtd>0){
        valor -= 0.7;
        valor = parseFloat(valor.toFixed(2))
        atualizarValor();
        qtd--;
        document.getElementById('qtd-presunto').value = qtd;
    }
}
/*****Carne */
function addCarne(){
    valor+=1.25;
    atualizarValor();

    let qtd = document.getElementById('qtd-carne').value;
    qtd++;
    document.getElementById('qtd-carne').value = qtd;

    let principal = document.getElementById('adicionais')
    let adicional = document.createElement('div');
    adicional.id = "carne-"+qtd;
    adicional.className = "adc-carne";
    principal.appendChild(adicional);
}

function rmvCarne(){
    let qtd = document.getElementById('qtd-carne').value;
    let rmv_elemento = document.getElementById('carne-'+qtd);
    let principal = document.getElementById('adicionais');
    principal.removeChild(rmv_elemento);
    console.log(rmv_elemento);

    if(qtd>0){
        valor-=1.25;
        atualizarValor();
        qtd--;
        document.getElementById('qtd-carne').value = qtd;
    }
}

function addBacon(){
    valor+=1.50;
    atualizarValor();

    let qtd = document.getElementById('qtd-bacon').value;
    qtd++;
    document.getElementById('qtd-bacon').value = qtd;

    let principal = document.getElementById('adicionais')
    let adicional = document.createElement('div');
    adicional.id = "bacon-"+qtd;
    adicional.className = "adc-bacon";
    principal.appendChild(adicional);
}

function rmvBacon(){
    let qtd = document.getElementById('qtd-bacon').value;
    let rmv_elemento = document.getElementById('bacon-'+qtd);
    let principal = document.getElementById('adicionais');
    principal.removeChild(rmv_elemento);
    console.log(rmv_elemento);

    if(qtd>0){
        valor-=1.50;
        atualizarValor();
        qtd--;
        document.getElementById('qtd-bacon').value = qtd; 
    }
}

function logarCadastrar(){
    let mensagem = document.getElementById('logar-cadastrar');
    let botao = document.getElementById('logar');
    let opcao = document.getElementById('opcao');
    if(mensagem.innerHTML === "Trocar para 'CADASTRAR'"){
        mensagem.innerHTML = "Trocar para 'LOGAR'";
        botao.textContent = 'Cadastrar e pedir';
        opcao.value = "cadastrar";
    }
    else{
        mensagem.innerHTML = "Trocar para 'CADASTRAR'";
        botao.textContent = 'Logar e pedir';
        opcao.value = "logar";
    }
}

function atualizarValor(){
    document.getElementById('valor').value = "R$ "+ valor ;
  
}
    
function mostrarFormulario(){
    document.getElementById('login').style.display = "block";
    document.getElementById('pedir').style.display = "none";
    var heightPage = document.body.scrollHeight;
    window.scrollTo(0 , heightPage);
}
