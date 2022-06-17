<h1>editar categoria</h1>
<?php $registro = $data->fetch(\PDO::FETCH_ASSOC);?>

<form action="" method="post" class="form-group">
<label for="name">Nome</label>
<input id="name" name="name" value="<?php echo $registro['name'];?>" type="text" class="form-control" required>
<label for="description">Descrição</label>
<input id="description" name="description" value="<?php echo $registro['description'];?>" type="text" class="form-control" required>
<label for="value">Valor</label>
<input id="value" name="value" type="numeric" value="<?php echo $registro['value'];?>" class="form-control" required>
<label for="quantity">Quantidade</label>
<input id="quantity" name="quantity" value="<?php echo $registro['quantity'];?>" type="numeric" class="form-control" required>
<label for="photo">Photo</label>
<input id="photo" name="photo" type="text" value="<?php echo $registro['photo'];?>" class="form-control" required>
<label for="category_id">Categoria</label>
<select id="category_id" name="category_id" class="form-control" required>
    <?php 
    while ( $cat = $data2->fetch(\PDO::FETCH_ASSOC)){
        if($cat['id']==$registro['category_id']){    
        echo "<option value='{$cat['id']}' selected>{$cat['name']}</option>";
    }else{
        echo "<option value='{$cat['id']}'>{$cat['name']}</option>";
    }
}
        ?>

<input id="id" name="id" value="<?php echo $registro['id'];?>" type="text" hidden>
<input type="submit" value="Editar" class="btn btn-dark">

</form>