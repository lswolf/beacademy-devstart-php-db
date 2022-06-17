<h1>lista de produtos </h1>

<div class="mb-3 text-end">
    <a href="product/add" class="btn btn-sucess">Novo Produto</a>
    <a href="product/report" class="btn btn-dark">Gerar PDF</a>
</div>


<table class=" table table-dark">
    <thead >
        <th>nome</th>
        <th>descrição</th>
        <th>preço</th>
        <th>quantidade</th>
        <th>categoria</th>
        <th>photo</th>
        <th>criado em </th>
        <th>ações</th>
    </thead>
    <tbody>
    <?php
            while ( $registro = $data->fetch(\PDO::FETCH_ASSOC)){
                while ( $cat= $data2->fetch(\PDO::FETCH_ASSOC)){
                    if($cat['id']==$registro['category_id']){
                        $catname = $cat['name'];
                    }
                }
                echo'<tr>';
                echo'<td>'.$registro['name'].'</td>';
                echo'<td>'.$registro['description'].'</td>';
                echo'<td> R$: '.$registro['value'].'</td>';
                echo'<td>'.$registro['quantity'].'</td>';
                echo'<td>'.$catname.'</td>';
                echo"<td><img width='100px' src='".$registro['photo']."'></td>";
                echo'<td>'.$registro['created_at'].'</td>';
                echo"<td>
                <a href='/product/edit?id=".$registro['id']."' class='btn btn-warning'>Editar</a>
                <a href='/product/delete?id=".$registro['id']."' class='btn btn-danger'>Excluir</a>
                </td>";
                echo'</tr>' ;
        }
        ?>
    </tbody>
</table>