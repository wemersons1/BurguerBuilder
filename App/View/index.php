<?php
    if(isset($_GET['login']) && $_GET['login']==='deslogado'){
?>
    <span class="text-success">Obrigado por usar o W-burguer</span>
<?php
    }
?>

<div class="painel">
    <div class="hamburguer">
        <div class="pao">
            <img src="img/pao.png" class="pao-head">
        </div>
        <div id="adicionais">   
        </div>
        <div class="pao">
            <img src="img/pao.png" class="pao-footer">
        </div>
    
    </div>
    <form method="POST" action="/autenticar">  
        <div class="itens">
            <div class="opcoes">
                <span>R$ 0.50</span>
                <input class="qtd" id="qtd-queijo" name="qtd-queijo" Readonly value="0" type="text">
                <a class="menos" onclick=rmvQueijo()>-</a>
                <a class="mais" onclick=addQueijo()>+</a>
                <span class="opcao"> Queijo </span>
            </div>
        
            <div class="opcoes">
                <span>R$ 0.70</span>
                <input class="qtd" id="qtd-presunto" name="qtd-presunto" Readonly value="0" type="text">
                <a class="menos" onclick=rmvPresunto()>-</a>
                <a class="mais" onclick=addPresunto()>+</a>
                <span class="opcao"> Presunto </span>
            </div>

            <div class="opcoes">
                <span>R$ 1.25</span>
                <input class="qtd" id="qtd-carne" name="qtd-carne" Readonly  value="0" type="text">
                <a class="menos" onclick=rmvCarne()>-</a>
                <a class="mais" onclick=addCarne()>+</a>
                <span class="opcao"> Carne </span>
            </div>

            <div class="opcoes">
                <span>R$ 1.50</span>
                <input class="qtd" id="qtd-bacon" name="qtd-bacon" Readonly value="0" type="text">
                <a class="menos" onclick=rmvBacon()>-</a>
                <a class="mais" onclick=addBacon()>+</a>
                <span class="opcao"> Bacon </span>
            </div>

            <input id="valor" name="valor" Readonly value="R$ 0,00" type="text">
            
        </div>

        <div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="cidade" class="input-group-text">Cidade: </label>
                    </div>
                        <input class="form-control" type="text" id="cidade" name="cidade" required>
                </div>
                
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="bairro">Bairro: </label>
                    </div>
                    <input class="form-control" type="text" id="bairro" name="bairro" required>
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="complemento" class="input-group-text">Complemento: </label>
                    </div>
                    <input class="form-control" type="text" id="complemento" name="complemento"  required>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="cep">Cep: </label>
                    </div>
                    <input class="form-control" type="text" id="cep" name="cep" required>
                </div>
                <div class="text-center"> 
                    <button class="btn btn-outline-info mt-4" id="pedir" onclick="mostrarFormulario()">Solicitar</button>
                </div>
            </div>

        </div>  
        <div id="login" class="login">
            <div>
                <input class="campo" placeholder="E-mail" type="email" name="user" required>
            </div>
            <div>  
                <input class="campo" placeholder="Senha" type="password" name="pass" required>
            </div>
            <input id="opcao" type="hidden" name="opcao" value="logar">
            <button id="logar" class="btn btn-primary">Logar e pedir</button>

            <?php
            if(isset($_GET['login'])&& $_GET['login']=="erro")
            {
            ?>
            <script defer>
               
                document.getElementById('login').style.display="block";
                document.getElementById('pedir').style.display="none";
               
            </script>
            <div class='erro'><strong>Dados inválidos</strong><div>
          
            <?php
            }
              ?>
            <div class="mudar-opc">
                <a id="logar-cadastrar" href="#" onclick="logarCadastrar()">Trocar para 'CADASTRAR'</a>
            </div>
        </div>
        
    </form>
        
</div>

    
   
            
        


