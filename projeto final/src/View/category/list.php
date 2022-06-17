<h1>lista de categorias </h1>
<div class="mb-3 text-end">
    <a href="category/add" class="btn btn-sucess">Nova Categoria</a>
</div>
<table class=" table table-dark">
    <thead>
        <th>nome</th>
        <th>descrição</th>
        <th>ações</th>
    </thead>
    <tbody>

        <?php
            while ( $registro = $data->fetch(\PDO::FETCH_ASSOC)){
                echo'<tr>';
                echo'<td>'.$registro['name'].'</td>';
                echo'<td>'.$registro['description'].'</td>';
                echo"<td>
                <a href='/category/edit?id=".$registro['id']."' class='btn btn-warning'>Editar</a>
                <a href='/category/delete?id=".$registro['id']."' class='btn btn-danger'>Excluir</a>
                </td>";
                echo'</tr>' ;
        }
        ?>
    </tbody>
</table>