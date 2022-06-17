<h1>adicionar  Produtos</h1>


<form action="" method="post" class="form-group">
<label for="name">Nome</label>
<input id="name" name="name" type="text" class="form-control" required>
<label for="description">Descrição</label>
<input id="description" name="description" type="text" class="form-control" required>
<label for="value">Valor</label>
<input id="value" name="value" type="numeric" class="form-control" required>
<label for="quantity">Quantidade</label>
<input id="quantity" name="quantity" type="numeric" class="form-control" required>
<label for="photo">Photo</label>
<input id="photo" name="photo" type="text" class="form-control" required>
<label for="category_id">Categoria</label>
<select id="category_id" name="category_id" class="form-control" required>
    <?php 
    while ( $registro = $data->fetch(\PDO::FETCH_ASSOC)){
        echo "<option value='{$registro['id']}'>{$registro['name']}</option>";
    }
        ?>

<input type="submit" value="Cadastrar" class="btn btn-dark">

</form>

