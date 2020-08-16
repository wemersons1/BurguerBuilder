<nav>
    <ul>
        <li>
             <a class="text-right text-info" href="/home">Home</a>
        </li>
        <li style="margin-left:auto">
            <a class="text-right text-danger nav-link" href="/logout">Logout</a>
        </li>
    </ul>
</nav>

<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th class="text-center"  scope="col">#</th>
      <th class="text-center"  scope="col">Qtd-queijo</th>
      <th class="text-center"  scope="col">Qtd-carne</th>
      <th class="text-center"  scope="col">Qtd-bacon</th>
      <th class="text-center"  scope="col">Qtd-presunto</th>
      <th class="text-center"  scope="col">Valor</th>
      <th class="text-center"  scope="col">Endereço</th>
    </tr>
  </thead>
  <tbody>
  <?php
    for($i=0; $i<count($dados); $i++){
  ?>
    <tr>
      <th scope="row"><?=$i+1?></th>
      <td class="text-center" ><?=$dados[$i]['qtd_queijo']?></td>
      <td class="text-center" ><?=$dados[$i]['qtd_carne']?></td>
      <td class="text-center" ><?=$dados[$i]['qtd_bacon']?></td>
      <td class="text-center" ><?=$dados[$i]['qtd_presunto']?></td>
      <td class="text-center" ><?=$dados[$i]['valor']?></td>
      <td class="text-center" ><?=$dados[$i]['cidade']." | ".$dados[$i]['bairro'].' | '.$dados[$i]['complemento'].' | '.$dados[$i]['cep']?></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
